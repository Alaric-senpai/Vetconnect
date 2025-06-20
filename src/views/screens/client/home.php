<?php
require __DIR__ . "/../../../models/Pet.php";
require_once __DIR__ . "/../../../models/Appointments.php";
require_once __DIR__ . "/../../../models/User.php";

use App\Models\Pet\Pet;
use App\Models\Appointment\Appointment;
use App\Models\User\User;

$appointMent = new Appointment();
$allappointments = $appointMent->findByUser();

$users = new User();
$pet  = new Pet();
$allpets = $pet->getAllByUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PetOwner - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Appointments -->
    <div class="bg-white p-5 rounded-xl shadow-md">
      <h2 class="text-xl font-bold text-gray-800 mb-2">My Appointments</h2>
      <p class="text-gray-600">Below are your most recent bookings.</p>
      <div class="mt-5">
        <?php
        $shown = 0;
        if (!empty($allappointments)) :
          foreach ($allappointments as $appointment) :
            if ($shown >= 2) break;
            $shown++;

            $thispet = $pet->getByID(abs($appointment['pet_id']));
            $status = strtolower($appointment['status']);
            $statusColor = match ($status) {
              'scheduled' => 'bg-yellow-100 text-yellow-800',
              'waiting' => 'bg-blue-100 text-blue-800',
              'completed' => 'bg-green-100 text-green-800',
              'cancelled' => 'bg-red-100 text-red-800',
              default => 'bg-gray-100 text-gray-800',
            };
        ?>
        <div class="max-w-md mx-auto bg-white border border-blue-200 rounded-xl shadow-md p-5 hover:shadow-lg transition-all duration-300 ease-in-out mb-4">
          <div class="flex items-start space-x-4">
            <div class="bg-blue-100 text-blue-700 rounded-full p-2">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <div class="flex-1">
              <h2 class="text-lg font-semibold text-blue-700">
                <?= htmlspecialchars($appointment['name']) ?>
              </h2>
              <p class="text-gray-600 text-sm">
                For: <span class="font-medium"><?= htmlspecialchars($thispet['name'] ?? 'Unknown Pet') ?></span>
                (<?= htmlspecialchars($thispet['species'] ?? 'Unknown') ?>)
              </p>
              <p class="text-gray-600 text-sm">Date: <?= htmlspecialchars(date('D, d M Y - h:i A', strtotime($appointment['appointment_time']))) ?></p>
              <p class="text-gray-500 text-xs mt-1 italic">Assigned Vet: <?= htmlspecialchars($appointment['vet_id'] ? $users->findUserByVetId($appointment['vet_id'])['name']  : 'Not Assigned') ?></p>

              <span class="inline-block mt-2 px-3 py-1 text-xs font-bold rounded-full <?= $statusColor ?>">
                <?= ucfirst($status) ?>
              </span>
            </div>
          </div>
          <div class="mt-4 flex justify-end space-x-2">
            <?php if ($status === 'scheduled'): ?>
              <button class="text-sm text-blue-600 hover:underline">Reschedule</button>
            <?php endif; ?>
            <?php if ($status !== 'completed'): ?>
              <button class="text-sm text-red-600 hover:underline">Cancel</button>
              <?php endif; ?>
            <?php if ($status === 'completed'): ?>
              <button class="text-sm text-blue-600 hover:underline">Open medical reports</button>
            <?php endif; ?>
            
            
          </div>
        </div>
        <?php
          endforeach;
        else :
        ?>
        <div class="w-full my-2 text-center border border-emerald-400 border-dashed rounded-md p-4 shadow-md shadow-teal-100 hover:scale-105 hover:shadow-lg duration-300 ease-linear cursor-pointer">
          <p>You have not created any appointment. Get started...</p>
        </div>
        <?php endif; ?>
      </div>

      <div class="mt-3">
        <a href="?page=new_appointment">
          <button class="w-full h-10 bg-blue-600 hover:bg-blue-700 transition-all duration-300 ease-linear p-3 text-center text-white rounded-md shadow-md hover:shadow-lg cursor-pointer flex items-center justify-center mt-3">
            Book an appointment
          </button>
        </a>
      </div>
    </div>

    <!-- Pet Profiles -->
    <div class="bg-white p-5 rounded-xl shadow-md">
      <h2 class="text-xl font-bold text-gray-800 mb-2">My Pet Profiles</h2>
      <p class="text-gray-600 mb-5">Manage your pets’ health records and history.</p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 my-5">
        <?php if (!empty($allpets)) : ?>
          <?php foreach ($allpets as $pet): ?>
            <div class="border border-slate-300 rounded-lg p-3 flex shadow-sm hover:shadow-md transition-all duration-300 ease-in-out hover:scale-105 bg-white group items-center">
              <img src="assets/images/pet.jpg" alt="pet avatar" class="w-16 h-16 rounded-full object-cover group-hover:scale-110 transition-transform duration-300" />
              <div class="ml-4">
                <h2 class="text-blue-500 text-lg font-semibold"><?= htmlspecialchars($pet['name']) ?></h2>
                <p class="text-gray-600 italic text-sm"><?= htmlspecialchars($pet['species']) ?> - <?= htmlspecialchars($pet['breed']) ?></p>
                <p class="text-gray-500 text-xs">Age: <?= (int)$pet['age'] ?> | Gender: <?= htmlspecialchars($pet['sex']) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <p class="text-gray-500 italic">You have not registered any pets yet.</p>
        <?php endif; ?>
      </div>

      <a href="?page=register_pet">
        <button class="w-full h-10 bg-blue-600 hover:bg-blue-700 transition-all duration-300 ease-linear p-3 text-center text-white rounded-md shadow-md hover:shadow-lg cursor-pointer flex items-center justify-center">
          Add a new Pet
        </button>
      </a>
    </div>
  </div>
</body>
</html>
