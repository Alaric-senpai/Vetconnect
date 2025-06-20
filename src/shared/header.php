<?php

require_once __DIR__ . '/../models/User.php';
use App\Models\User\User;

$user = new User();

// Get user data from session and DB
$userId = $_SESSION['user_id'] ?? null;
$role = $_SESSION['role'] ?? 'guest';

$userData = $userId ? $user->findById($userId) : null;


unset($_SESSION['appid']);
unset($_SESSION['medreport']);

?>

<div class="bg-white p-6 rounded-xl shadow-lg mb-6">
  <h1 class="text-3xl font-extrabold text-blue-700 mb-2">
    Welcome, <?= htmlspecialchars($userData['name'] ?? $name ?? 'Guest') ?>
  </h1>


  <?php if ($userData): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
      <div><strong>Email:</strong> <?= htmlspecialchars($userData['email']) ?></div>
      <div><strong>Username:</strong> <?= htmlspecialchars($userData['username']) ?></div>
      <div><strong>Phone:</strong> <?= htmlspecialchars($userData['phone']) ?></div>
      <div><strong>Address:</strong> <?= htmlspecialchars($userData['address']) ?></div>
    </div>
  <?php endif; ?>

  <div class="flex items-center justify-end mt-4">
    <a href="?page=logout" class="flex items-center text-white gap-4 bg-red-500 rounded-md px-4 p-2 shadow-md hover:shadow-md hover:scale-105 duration-300 transition-all ease-linear ">
      <?= icon('material-symbols:logout')->attributes(['class'=> 'text-3xl font-bold text-white']) ?>
      logout
    </a>
  </div>

  <?php if (isset($_SESSION['flash'], $_SESSION['success'])): ?>
    <?php $success = $_SESSION['success']; ?>
    <div class="p-3 py-4 border-l-2 <?= $success ? 'border-l-emerald-600 bg-emerald-100' : 'border-l-red-600 bg-red-100' ?> bg-gradient-to-r rounded-md shadow-xs flex items-center gap-5 mt-4">
      <?= icon($success ? 'material-symbols:check-circle-outline-rounded' : 'material-symbols:error-outline-rounded')->attributes([
        'class' => $success ? 'text-3xl text-emerald-600' : 'text-3xl text-red-600'
      ]) ?>
      <p class="text-gray-700 font-medium"><?= htmlspecialchars($_SESSION['flash']) ?></p>
    </div>
    <?php unset($_SESSION['flash'], $_SESSION['success']); ?>
  <?php endif; ?>
</div>
