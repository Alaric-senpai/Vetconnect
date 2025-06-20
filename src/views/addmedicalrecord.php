<?php
require_once __DIR__ . "/../models/Appointments.php";
require_once __DIR__ . "/../models/Pet.php";
require_once __DIR__ . "/../models/User.php";

use App\Models\Appointment\Appointment;
use App\Models\User\User;
use App\Models\Pet\Pet;

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pet = new Pet();
$appointctr = new Appointment();
$user = new User();

$appointment = isset($_SESSION['appid']) ? $appointctr->find($_SESSION['appid']) : null;


if (!$appointment) {
    echo "<h2 class='text-red-500 text-center mt-10'>Invalid appointment or session expired.</h2>";
    exit;
}

$currentPet = $pet->getByID($appointment['pet_id']);
$petowner = $user->findUserByPetId($currentPet['id']);
$vetId = $_SESSION['vet_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Medical Report - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

<?php require_once __DIR__ . '/../shared/miniheader.php'; ?>

<div class="flex flex-col md:flex-row gap-6 w-full">

    <!-- Pet Information Card -->
    <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-4/12 shadow-lg flex flex-col items-center text-center transition hover:scale-[1.01] h-max">
        <img src="assets/images/pet.jpg" alt="Pet Avatar"
             class="w-28 aspect-square object-cover rounded-full border-2 border-emerald-400 shadow-md mb-4">

        <a href="?page=pets_medical_records&pet_id=<?php echo $currentPet['id'] ?>">
            <h2 class="text-2xl font-bold text-emerald-700 underline underline-offset-4 mb-2"><?= htmlspecialchars($currentPet['name']) ?></h2>
        </a>
        <p class="text-gray-600 mb-2">
            <?= htmlspecialchars($currentPet['species']) ?> 
            • <?= htmlspecialchars($currentPet['breed']) ?> 
            • <?= htmlspecialchars($currentPet['age']) ?> Years old
        </p>
        
        <p class="text-gray-500 mb-4">
            Owner: <?= htmlspecialchars($petowner['name']) ?>
        </p>

        <p class="text-sm italic text-gray-700">Create a medical report for <?= htmlspecialchars($currentPet['name']) ?></p>


                <!-- Appointment Details -->
        <div class="mb-6 bg-emerald-50 border w-full space-y-4 mt-5 shadow-md shadow-emerald-200  border-emerald-200 rounded-lg p-4 ">
        <h3 class="text-lg font-semibold text-emerald-800 mb-2">Appointment Information</h3>
        <ul class="text-gray-700 space-y-1 text-sm">
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


    </div>

    <!-- Medical Report Form -->
    <div class="p-6 bg-white border border-emerald-400 rounded-xl w-full md:w-8/12 shadow-lg">
        <h2 class="text-xl font-semibold text-emerald-700 mb-6">Medical Report Details</h2>

        <form method="post" action="?page=save_medical_report" class="space-y-6">

            <input type="hidden" name="pet_id" value="<?= htmlspecialchars($currentPet['id']) ?>">
            <input type="hidden" name="vet_id" value="<?= $vetId ? htmlspecialchars($vetId) : '' ?>">

            <!-- Visit Date -->
            <div>
                <label for="visit_date" class="block font-medium text-gray-700 mb-1">Visit Date</label>
                <input type="date" name="visit_date" id="visit_date" required
                       class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200">
            </div>

            <!-- Diagnosis -->
            <div>
                <label for="diagnosis" class="block font-medium text-gray-700 mb-1">Diagnosis</label>
                <textarea name="diagnosis" id="diagnosis" rows="5" required
                          class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200"
                          placeholder="Describe the diagnosis..."></textarea>
            </div>

            <!-- Treatment -->
            <div>
                <label for="treatment" class="block font-medium text-gray-700 mb-1">Treatment Plan</label>
                <textarea name="treatment" id="treatment" rows="5" required
                          class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200"
                          placeholder="Provide treatment details..."></textarea>
            </div>

            <!-- Notes -->
            <div>
                <label for="notes" class="block font-medium text-gray-700 mb-1">Additional Notes</label>
                <textarea name="notes" id="notes" rows="5"
                          class="w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:border-emerald-500 focus:ring focus:ring-emerald-200"
                          placeholder="Optional notes..."></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full h-10 tex-center bg-blue-600 text-white rounded-md shadow-md hover:bg-teal-400 duration-300 ease-linear transition-all">
                Save medical report
            </button>
        </form>
    </div>

</div>

</body>
</html>
