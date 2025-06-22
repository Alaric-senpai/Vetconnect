<?php
require_once __DIR__ . "/../models/Appointments.php";
require_once __DIR__ . "/../models/Pet.php";
require_once __DIR__ . "/../models/User.php";
require_once __DIR__ . "/../models/MedicalReport.php";

use App\Models\Appointment\Appointment;
use App\Models\User\User;
use App\Models\Pet\Pet;
use App\Models\MedicalReport\MedicalReport;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$petId = $_SESSION['pet_id'] ?? null;
if (!$petId) {
    echo "<p class='text-red-500 text-center mt-10'>Pet not selected or session expired.</p>";
    exit;
}

$petModel = new Pet();
$userModel = new User();
$reportModel = new MedicalReport();

$pet = $petModel->getByID($petId);
$owner = $userModel->findUserByPetId($petId);
$reports = $reportModel->getReportsByPet($petId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Pet Records - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

<?php require_once __DIR__ . '/../shared/miniheader.php'; ?>

<div class="flex flex-col md:flex-row gap-6 w-full">

  <!-- Pet Info Card (Left Column) -->
  <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-4/12 shadow-lg flex flex-col items-center text-center transition hover:scale-[1.01] h-max">
    <img src="assets/images/pet.jpg" alt="Pet Avatar"
         class="w-28 aspect-square object-cover rounded-full border-2 border-emerald-400 shadow-md mb-4">

    <h2 class="text-2xl font-bold text-emerald-700 underline underline-offset-4 mb-2"><?= htmlspecialchars($pet['name']) ?></h2>

    <p class="text-gray-600 mb-2">
        <?= htmlspecialchars($pet['species']) ?> • <?= htmlspecialchars($pet['breed']) ?> • <?= htmlspecialchars($pet['age']) ?> Years old
    </p>

    <p class="text-gray-500 mb-4">Owner: <?= htmlspecialchars($owner['name']) ?></p>

    <p class="text-sm italic text-gray-700">Viewing medical history for <?= htmlspecialchars($pet['name']) ?></p>
  </div>

  <!-- Medical Reports (Right Column) -->
  <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-8/12 shadow-lg space-y-4">
    <h2 class="text-xl font-semibold text-emerald-700 mb-4">Medical History</h2>

    <?php if (empty($reports)): ?>
      <p class="text-gray-500 italic">No medical reports found for this pet.</p>
    <?php else: ?>
      <?php foreach ($reports as $report): 
        $vet = $userModel->findUserByVetId($report['vet_id']);
      ?>
        <a href="?page=view_medical_report&report_id=<?php echo $report['id'] ?>">
          <div class="bg-emerald-50 border border-emerald-200 rounded-lg mb-5 p-4 shadow-sm hover:shadow-md transition-all space-y-2">
            <div class="flex justify-between items-center">
              <h3 class="text-lg font-bold text-emerald-800">Visit: <?= htmlspecialchars($report['visit_date']) ?></h3>
              <span class="text-xs italic text-gray-500"><?= date("M d, Y", strtotime($report['created_at'])) ?></span>
            </div>
  
            <p class="text-sm text-gray-700"><span class="font-semibold">Vet:</span> Dr. <?= htmlspecialchars($vet['name']) ?></p>
  
  
          </div>

        </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

</div>

</body>
</html>
