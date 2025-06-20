<?php
require_once __DIR__ . "/../models/Appointments.php";
require_once __DIR__ . "/../models/Pet.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/MedicalReport.php";

use App\Models\Appointment\Appointment;
use App\Models\User\User;
use App\Models\Pet\Pet;
use App\Models\MedicalReport\MedicalReport;

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pet = new Pet();
$appointctr = new Appointment();
$user = new User();
$reportModel = new MedicalReport();

$reportId = $_SESSION['medreport'] ?? null;

if (!$reportId) {
    echo "<p class='text-red-500 text-center mt-10'>Medical report not found or session expired.</p>";
    exit;
}

$report = $reportModel->find($reportId);
if (!$report) {
    echo "<p class='text-red-500 text-center mt-10'>Invalid medical report ID.</p>";
    exit;
}

$currentPet = $pet->getByID($report['pet_id']);
$petowner = $user->findUserByPetId($currentPet['id']);
$vet = $user->findUserByVetId($report['vet_id']);
$appointment = $appointctr->find($report['pet_id']); // fallback if no specific appointment id is available
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>View Medical Report - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

<?php require_once __DIR__ . '/../shared/miniheader.php'; ?>

<div class="flex flex-col md:flex-row gap-6 w-full">

  <!-- Pet Info Card -->
  <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-4/12 shadow-lg flex flex-col items-center text-center h-max">
    <img src="assets/images/pet.jpg" alt="Pet Avatar"
         class="w-28 aspect-square object-cover rounded-full border-2 border-emerald-400 shadow-md mb-4">
    <a href="?page=pets_medical_records&pet_id=<?php echo $currentPet['id'] ?>">
        <h2 class="text-2xl font-bold text-emerald-700 underline underline-offset-4 mb-2"><?= htmlspecialchars($currentPet['name']) ?></h2>
    </a>

    <p class="text-gray-600 mb-2">
      <?= htmlspecialchars($currentPet['species']) ?> • <?= htmlspecialchars($currentPet['breed']) ?> • <?= htmlspecialchars($currentPet['age']) ?> Years old
    </p>

    <p class="text-gray-500 mb-4">Owner: <?= htmlspecialchars($petowner['name']) ?></p>

    <p class="text-sm italic text-gray-700">Report submitted by Dr. <?= htmlspecialchars($vet['name']) ?></p>

    <!-- Optional: Appointment Info -->
    <?php if (!empty($appointment)): ?>
    <div class="mt-6 bg-emerald-50 border w-full space-y-4 shadow-md border-emerald-200 rounded-lg p-4">
      <h3 class="text-lg font-semibold text-emerald-800 mb-2">Appointment Info</h3>
      <ul class="text-gray-700 text-sm space-y-1">
        <li><span class="font-medium">Title:</span> <?= htmlspecialchars($appointment['name']) ?></li>
        <li><span class="font-medium">Reason:</span> <?= htmlspecialchars($appointment['reason']) ?></li>
        <li><span class="font-medium">Scheduled For:</span> <?= date("F j, Y \\a\\t g:i A", strtotime($appointment['appointment_time'])) ?></li>
        <li><span class="font-medium">Status:</span> 
          <span class="inline-block px-2 py-0.5 text-xs rounded-md 
            <?= $appointment['status'] === 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 
                ($appointment['status'] === 'completed' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') ?>">
            <?= ucfirst($appointment['status']) ?>
          </span>
        </li>
      </ul>
    </div>
    <?php endif; ?>
  </div>

  <!-- Report Display -->
  <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-8/12 shadow-lg">
    <h2 class="text-xl font-semibold text-emerald-700 mb-6">Medical Report Details</h2>

    <div class="space-y-6 text-gray-700 text-sm">
      <div>
        <h3 class="font-semibold text-md text-emerald-800 mb-1">Visit Date</h3>
        <p><?= htmlspecialchars($report['visit_date']) ?></p>
      </div>

      <div>
        <h3 class="font-semibold text-md text-emerald-800 mb-1">Diagnosis</h3>
        <p class="bg-gray-100 p-3 rounded-md shadow-inner"><?= nl2br(htmlspecialchars($report['diagnosis'])) ?></p>
      </div>

      <div>
        <h3 class="font-semibold text-md text-emerald-800 mb-1">Treatment</h3>
        <p class="bg-gray-100 p-3 rounded-md shadow-inner"><?= nl2br(htmlspecialchars($report['treatment'])) ?></p>
      </div>

      <div>
        <h3 class="font-semibold text-md text-emerald-800 mb-1">Additional Notes</h3>
        <p class="bg-gray-100 p-3 rounded-md shadow-inner"><?= nl2br(htmlspecialchars($report['notes'])) ?></p>
      </div>

      <div class="text-right text-xs text-gray-500 italic">
        Submitted on <?= date("F j, Y \\a\\t g:i A", strtotime($report['created_at'])) ?>
      </div>
    </div>
  </div>
</div>

</body>
</html>
