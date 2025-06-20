<?php

require_once __DIR__ . '/../models/User.php';
use App\Models\User\User;

$user = new User();

// Get user data from session and DB
$userId = $_SESSION['user_id'] ?? null;
$role = $_SESSION['role'] ?? 'guest';

$userData = $userId ? $user->findById($userId) : null;

?>

<div class="bg-white p-6 rounded-xl shadow-lg mb-6 flex flex-row items-center justify-between">
  <h1 class="text-3xl font-extrabold text-blue-700 mb-2">
    Welcome, <?= htmlspecialchars($userData['name'] ?? $name ?? 'Guest') ?>
  </h1>

    <div class="flex gap-3">
        <a href="?page=dashboard" class="flex items-center text-white gap-4 bg-teal-500 rounded-md px-4 p-2 shadow-md hover:shadow-md hover:scale-105 duration-300 transition-all ease-linear ">
          <?= icon('material-symbols:arrow-left')->attributes(['class'=> 'text-3xl font-bold text-white']) ?>
          Dashboard
        </a>
        <a href="?page=logout" class="flex items-center text-white gap-4 bg-red-500 rounded-md px-4 p-2 shadow-md hover:shadow-md hover:scale-105 duration-300 transition-all ease-linear ">
          <?= icon('material-symbols:logout')->attributes(['class'=> 'text-3xl font-bold text-white']) ?>
          logout
        </a>
    </div>


</div>
