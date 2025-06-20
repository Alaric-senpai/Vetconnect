<?php
require_once __DIR__ . "/../../../models/Appointments.php";
require_once __DIR__ . "/../../../models/User.php";
require_once __DIR__ . "/../../../models/Pet.php";

use App\Models\Appointment\Appointment;
use App\Models\User\User;
use App\Models\Pet\Pet;

$appointmentmn = new Appointment();
$user = new User();
$pet = new Pet();
$appointments = $appointmentmn->all();
$vets = $user->fetchAllvets(); // You must have this implemented


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Receptionist Dashboard - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .modal {
      display: none;
      position: fixed;
      z-index: 40;
      left: 0; top: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.5);
      align-items: center;
      justify-content: center;
    }
    .modal-content {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      min-width: 300px;
    }
  </style>
</head>
<body class="min-h-screen bg-gray-100 p-6">
  <h1 class="text-2xl font-bold text-blue-800 mb-6">Receptionist Dashboard</h1>

  <div class="bg-white p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Appointments</h2>

    <div class="grid grid-cols-1 gap-4">
      <?php foreach ($appointments as $appointment): 
        $client = $user->findById($appointment['owner_id']);
        $thispet = $pet->getByID($appointment['pet_id']);
      ?>
        <div class="border border-gray-300 p-4 rounded-lg bg-white shadow-sm hover:shadow-md transition-all">
          <div class="flex justify-between items-start">
            <div>
              <h3 class="text-lg font-semibold text-blue-600"><?= htmlspecialchars($thispet['name']) ?> (<?= htmlspecialchars($thispet['species']) ?>)</h3>
              <p class="text-sm text-gray-600">Owner: <?= htmlspecialchars($client['name']) ?></p>
              <p class="text-sm text-gray-600">Date: <?= date('D - d/M/Y', strtotime($appointment['appointment_time'])) ?></p>
              <p class="text-sm text-gray-600">
                Status:
                <span class="font-semibold <?= $appointment['status'] === 'Booked' ? 'text-green-600' : 'text-yellow-600' ?>">
                  <?= htmlspecialchars($appointment['status']) ?>
                </span>
              </p>
              <p class="text-sm text-gray-600">
                Assigned Doctor:
                <span class="font-medium"><?=   $appointment['vet_id'] ? $user->findUserByVetId($appointment['vet_id'])['name']  :'Unassigned' ?></span>
              </p>
            </div>
            <div class="flex flex-col space-y-2 text-sm">
              <?php if (!$appointment['vet_id']): ?>
                <button onclick="openAssignModal(<?= $appointment['id'] ?>)" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded shadow">Assign Doctor</button>
              <?php endif; ?>
              <button onclick="openStatusModal(<?= $appointment['id'] ?>)" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded shadow">Update Status</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Assign Doctor Modal -->
  <div id="assignModal" class="modal flex">
    <div class="modal-content">
      <h2 class="text-lg font-semibold mb-2">Assign Doctor</h2>
      <form method="POST" action="?page=assign_doctor">
        <input type="hidden" name="appointment_id" id="assign_appointment_id">
        <select name="vet" required class="w-full h-14 mb-4 border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black">
          <?php foreach ($vets as $vet): ?>
            <option value="<?= $vet['vet_id'] ?>"><?= htmlspecialchars($vet['name']) ?></option>
          <?php endforeach; ?>
        </select>
        <div class="flex justify-between">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Assign</button>
          <button type="button" onclick="closeModal('assignModal')" class="text-red-500">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Update Status Modal -->
  <div id="statusModal" class="modal flex">
    <div class="modal-content">
      <h2 class="text-lg font-semibold mb-2">Update Status</h2>
      <form method="POST" action="?page=update_status">
        <input type="hidden" name="appointment_id" id="status_appointment_id">
        <select name="status" required class="w-full h-14 mb-4  border border-black p-4 placeholder-shown:text-emerald-800 outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg text-black">
          <option value="waiting">Waiting</option>
          <option value="scheduled">Scheduled</option>
          <option value="completed">Completed</option>
          <option value="cancelled">Cancelled</option>
        </select>
        <div class="flex justify-between">
          <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
          <button type="button" onclick="closeModal('statusModal')" class="text-red-500">Cancel</button>
        </div>
      </form>
    </div>
  </div>

  
  <script>
    function openAssignModal(id) {
      document.getElementById('assign_appointment_id').value = id;
      document.getElementById('assignModal').style.display = 'flex';
    }

    function openStatusModal(id) {
      document.getElementById('status_appointment_id').value = id;
      document.getElementById('statusModal').style.display = 'flex';
    }

    function closeModal(modalId) {
      document.getElementById(modalId).style.display = 'none';
    }
  </script>
</body>
</html>
