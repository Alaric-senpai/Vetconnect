<?php

require_once __DIR__ . '/../models/User.php';
use App\Models\User\User;

$user = new User();

// Get user data from session and DB
$userId = $_SESSION['user_id'] ?? null;
$role = $_SESSION['role'] ?? 'guest';

$userData = $userId ? $user->findById($userId) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 p-6">

  <div class="max-w-5xl mx-auto">

  <?php require_once __DIR__ . '/../shared/header.php'; ?>

    <!-- Admin Dashboard -->
    <?php if ($role === 'admin'): ?>
        <?php require_once __DIR__ . '/screens/admin/home.php' ?>


    <!-- Doctor Dashboard -->
    <?php elseif ($role === 'vet'): ?>
        <?php require_once __DIR__ . '/screens/vet/home.php' ?>

    <?php elseif ($role === 'receptionist'): ?>
        <?php require_once __DIR__ . '/screens/receptionist/home.php' ?>


    <!-- Client Dashboard -->
    <?php elseif ($role === 'client'): ?>
        <?php require_once __DIR__ . '/screens/client/home.php' ?>

    <!-- Guest View -->
    <?php else: ?>
      <div class="bg-yellow-100 p-5 rounded-xl shadow-md text-center">
        <h2 class="text-xl font-bold text-yellow-700">Access Restricted</h2>
        <p class="text-yellow-600">Please log in to view dashboard content.</p>
      </div>
    <?php endif; ?>
  </div>

</body>
</html>
