<?php
require_once __DIR__ . "/../../../models/Appointments.php";
require_once __DIR__ . "/../../../models/Pet.php";
require_once __DIR__ . "/../../../models/User.php";
require_once __DIR__ . "/../../../models/MedicalReport.php";

use App\Models\Pet\Pet;
use App\Models\Appointment\Appointment;
use App\Models\User\User;
use App\Models\MedicalReport\MedicalReport;


$reportctl = new MedicalReport();
$pet = new Pet();
$user = new User();
$appointmentModel = new Appointment();

$vet = $user->findVetByUserId($_SESSION['user_id']);
$_SESSION['vet_id'] = $vet['vet_id'];

$vetAppointments = $appointmentModel->findByVet($vet['vet_id']);
$vetReports = $reportctl->getReportsByVet($vet['vet_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Vet Dashboard - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">
  <h1 class="text-3xl font-bold text-blue-800 mb-6">Welcome, Dr. <?= htmlspecialchars($vet['name']) ?></h1>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Appointments Section -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upcoming Appointments</h2>
      <?php if (empty($vetAppointments)): ?>
        <p class="text-gray-600">No appointments assigned.</p>
      <?php else: ?>
        <div class="space-y-4">
          <?php foreach ($vetAppointments as $appt):
            $petData = $pet->getByID($appt['pet_id']);
            $client = $user->findById($appt['owner_id']);
          ?>
          <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl shadow-sm hover:shadow-md transition-all">
            <div class="flex justify-between items-start">
              <div>
                <h3 class="text-lg font-semibold text-blue-700"><?= htmlspecialchars($petData['name']) ?> (<?= htmlspecialchars($petData['species']) ?>)</h3>
                <p class="text-sm text-gray-700">Owner: <?= htmlspecialchars($client['name']) ?></p>
                <p class="text-sm text-gray-700">Date: <?= date("D, d M Y - H:i", strtotime($appt['appointment_time'])) ?></p>
                <p class="text-sm text-gray-700">Status: 
                  <span class="font-medium <?= $appt['status'] === 'completed' ? 'text-green-600' : 'text-yellow-600' ?>">
                    <?= ucfirst($appt['status']) ?>
                  </span>
                </p>
              </div>
              <div class="flex flex-col space-y-2">
                <?php if ($appt['status'] !== 'cancelled'): ?>
                <a href="?page=add_medical_record&appointment=<?= $appt['id']?>"
                   class="bg-green-600 text-white text-sm px-3 py-1 rounded shadow hover:bg-green-700">
                  Add Record
                </a>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Medical Records Section -->
    <div class="bg-white p-6 rounded-xl shadow-lg">
      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Medical Records</h2>
      <?php if (empty($vetReports)): ?>
        <p class="text-gray-600 italic">No medical reports submitted yet.</p>
      <?php else: ?>
        <div class="space-y-4 max-h-[480px] overflow-y-auto pr-2">
          <?php foreach ($vetReports as $record): 
            $relatedPet = $pet->getByID($record['pet_id']);
          ?>
          <a href="?page=view_medical_report&report_id=<?php echo $record['id'] ?>" class="my-4">
            <div class="bg-emerald-50 border border-emerald-200 p-4 mb-5 rounded-lg shadow-sm hover:shadow-md transition">
              <h3 class="text-md font-bold text-emerald-700"><?= htmlspecialchars($relatedPet['name']) ?> — <?= htmlspecialchars($record['visit_date']) ?></h3>
              <p class="text-sm text-gray-700"><span class="font-medium">Diagnosis:</span> <?= htmlspecialchars($record['diagnosis']) ?></p>
              <p class="text-sm text-gray-700"><span class="font-medium">Treatment:</span> <?= htmlspecialchars($record['treatment']) ?></p>
              <?php if (!empty($record['notes'])): ?>
                <p class="text-sm text-gray-500 italic">"<?= htmlspecialchars($record['notes']) ?>"</p>
              <?php endif; ?>
              <p class="text-xs text-gray-400 mt-2">Submitted: <?= date("d M Y, g:i A", strtotime($record['created_at'])) ?></p>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
