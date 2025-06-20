<?php
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ .'/../../../models/Appointments.php';
use App\Models\User\User;

use App\Models\Appointment\Appointment;

$userModel = new User();

$appointments = new Appointment();
// Get all users
$allUsers = $userModel->all();
$totalUsers = count($allUsers);

// Role-based counts
$totalClients = count(array_filter($allUsers, fn($u) => $u['role'] === 'client'));
$totalVets = count(array_filter($allUsers, fn($u) => $u['role'] === 'vet'));
$totalReceptionists = count(array_filter($allUsers, fn($u) => $u['role'] === 'receptionist'));


// Dummy monthly breakdown
$todayAppointments = 5;
$thisMonthAppointments = 42;
$totalAppointments = $appointments->countAllAppointments();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Analytics - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100 p-6">
  <h1 class="text-2xl font-bold mb-4 text-blue-800">System Analytics</h1>

  <div class="flex flex-wrap gap-3 mb-6 justify-center" >
  <a href="?page=manage_users" class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded shadow">
    Manage Users
  </a>
  <a href="?page=add_user" class="bg-green-600 hover:bg-green-700 text-white text-sm px-4 py-2 rounded shadow">
    Add User
  </a>
  <a href="?page=view_appointments" class="bg-purple-600 hover:bg-purple-700 text-white text-sm px-4 py-2 rounded shadow">
    View Appointments
  </a>
  <a href="?page=system_logs" class="bg-gray-700 hover:bg-gray-800 text-white text-sm px-4 py-2 rounded shadow">
    System Logs
  </a>
</div>


  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Total Appointments</h2>
      <p class="text-3xl font-bold text-purple-600"><?= $totalAppointments ?></p>
    </div>

    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Today’s Appointments</h2>
      <p class="text-3xl font-bold text-blue-500"><?= $todayAppointments ?></p>
    </div>

    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">This Month</h2>
      <p class="text-3xl font-bold text-green-600"><?= $thisMonthAppointments ?></p>
    </div>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Total Users</h2>
      <p class="text-2xl font-bold text-gray-800"><?= $totalUsers ?></p>
    </div>
    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Clients</h2>
      <p class="text-2xl font-bold text-blue-700"><?= $totalClients ?></p>
    </div>
    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Vets</h2>
      <p class="text-2xl font-bold text-purple-700"><?= $totalVets ?></p>
    </div>
    <div class="bg-white rounded-lg shadow p-5">
      <h2 class="text-sm font-medium text-gray-500">Receptionists</h2>
      <p class="text-2xl font-bold text-orange-600"><?= $totalReceptionists ?></p>
    </div>
  </div>

  <div class="bg-white p-5 rounded-xl shadow">
    <h2 class="text-lg font-semibold text-gray-700 mb-3">System Notes</h2>
    <ul class="list-disc list-inside text-sm text-gray-600 space-y-1">
      <li>All systems operational</li>
      <li>Average appointments per day: ~<?= floor($thisMonthAppointments / 15) ?></li>
      <li>Vet-to-client ratio: 1:<?= $totalVets > 0 ? floor($totalClients / $totalVets) : 0 ?></li>
    </ul>
  </div>
</body>
</html>
