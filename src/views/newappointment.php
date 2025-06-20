<?php
require_once __DIR__ . "/../models/Pet.php";
use App\Models\Pet\Pet;

$petModel = new Pet();
$allPets = $petModel->getAllByUser(); // assumes user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>New Appointment - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="assets/css/main.css" rel="stylesheet" />
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

<?php require_once __DIR__ . '/../shared/header.php'; ?>

<h1 class="text-center font-bold text-4xl my-3">
    Book an Appointment
</h1>
<p class="text-center leading-loose text-gray-600 italic">
    Fill out the form below to request a veterinary appointment.
</p>

<div class="bg-white mt-5 p-3 border border-blue-400 group rounded-md shadow-md hover:border-emerald-500 transition-all hover:shadow-lg duration-300 ease-linear">
  <form action="?page=submit_appointment" method="POST">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      
      <!-- Pet Selection -->
      <div class="flex flex-col justify-center p-4 gap-4">
        <label for="pet" class="text-gray-600 font-semibold tracking-wide italic">Choose Pet</label>
        <select name="pet" id="pet" required class="h-10 border border-black p-2 bg-white text-black outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg">
          <option value="" disabled selected>-- Select your pet --</option>
          <?php foreach ($allPets as $pet): ?>
            <option value="<?= $pet['id'] ?>"><?= htmlspecialchars($pet['name']) ?> (<?= htmlspecialchars($pet['species']) ?>)</option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- Appointment Date & Time -->
      <div class="flex flex-col justify-center p-4 gap-4">
        <label for="date" class="text-gray-600 font-semibold tracking-wide italic">Appointment Date & Time</label>
        <input type="datetime-local" name="date" id="date" required class="h-10 border border-black p-2 text-black outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg" />
      </div>
    
        <div class="flex flex-col justify-center p-4 gap-4">
        <label for="name" class="text-gray-600 font-semibold tracking-wide italic">Appointment Name</label>
        <input type="text" name="name" id="name" required class="h-10 border border-black p-2 text-black outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg"  placeholder="Give your appointment a name" />
      </div>

    </div>

    <!-- Reason Textarea -->
    <div class="flex flex-col justify-center p-4 gap-4">
      <label for="reason" class="text-gray-600 font-semibold tracking-wide italic">Reason for Visit</label>
      <textarea name="reason" id="reason" rows="4" required class="w-full border border-black p-4 placeholder-shown:text-emerald-800 text-black outline-0 hover:border-teal-400 hover:shadow-lg transition-all duration-300 ease-in-out rounded-md shadow-md focus:border-emerald-400 focus:border-2 focus:shadow-lg" placeholder="Describe your pet's issue..."></textarea>
    </div>

    <!-- Submit -->
    <button type="submit" class="w-full h-10 flex items-center justify-center bg-emerald-400 hover:bg-teal-400 duration-300 ease-linear transition-all shadow-md hover:scale-95 hover:shadow-lg text-white rounded-md mt-2">
      Book Appointment
    </button>
  </form>
</div>

</body>
</html>
