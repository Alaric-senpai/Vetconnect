<?php
require_once __DIR__ . '/../models/User.php';

use App\Models\User\User;

// Ensure admin is logged in
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ?page=login");
    exit;
}

$userModel = new User();
$allUsers = $userModel->all();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Users - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <script>
    function openModal(id) {
      document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
      document.getElementById(id).classList.add('hidden');
    }
  </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-100 font-sans antialiased text-gray-800 p-6">
  <?php require_once __DIR__ . '/../shared/miniheader.php'; ?>

  <div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-2xl font-bold text-emerald-800">User Management</h2>
      <button onclick="openModal('addUserModal')" class="bg-emerald-600 text-white px-4 py-2 rounded hover:bg-emerald-700">Add User</button>
    </div>

    <div class="overflow-auto">
      <table class="min-w-full  bg-black/55 backdrop-blur-md border-2 border-slate-950  rounded-md  shadow-md  table">
        <thead class="bg-emerald-100 table-header-group">
          <tr>
            <th class="px-4 py-2 text-left">Name</th>
            <th class="px-4 py-2 text-left">Username</th>
            <th class="px-4 py-2 text-left">Email</th>
            <th class="px-4 py-2 text-left">Role</th>
            <th class="px-4 py-2 text-left">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($allUsers as $user): ?>
          <tr class="border-t">
            <td class="px-4 py-2"><?= htmlspecialchars($user['name']) ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($user['username']) ?></td>
            <td class="px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
            <td class="px-4 py-2 capitalize"><?= htmlspecialchars($user['role']) ?></td>
            <td class="px-4 py-2 space-x-2">
              <button onclick="openModal('editModal<?= $user['id'] ?>')" class="text-blue-600 hover:underline">Edit</button>
              <button onclick="openModal('deleteModal<?= $user['id'] ?>')" class="text-red-600 hover:underline">Delete</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Add User Modal -->
  <div id="addUserModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-bold">Add New User</h3>
        <button onclick="closeModal('addUserModal')">&times;</button>
      </div>
      <form method="POST" action="?page=administrative_user_add">
        <input type="hidden" name="password" value="account@vetconnect">
        <input type="text" name="name" placeholder="Full Name" class="w-full mb-2 border p-2 rounded">
        <input type="text" name="username" placeholder="Username" class="w-full mb-2 border p-2 rounded">
        <input type="email" name="email" placeholder="Email" class="w-full mb-2 border p-2 rounded">
        <input type="text" name="phone" placeholder="Phone" class="w-full mb-2 border p-2 rounded">
        <input type="text" name="address" placeholder="Address" class="w-full mb-2 border p-2 rounded">
        <select name="role" class="w-full mb-4 border p-2 rounded">
          <option value="client">Client</option>
          <option value="vet">Vet</option>
          <option value="receptionist">Receptionist</option>
          <option value="admin">Admin</option>
        </select>
        <button type="submit" class="w-full bg-emerald-600 text-white py-2 rounded">Create User</button>
      </form>
    </div>
  </div>

  <!-- Dynamic Edit/Delete Modals -->
  <?php foreach ($allUsers as $user): ?>
    <!-- Edit Modal -->
    <div id="editModal<?= $user['id'] ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
      <div class="bg-white p-6 rounded-lg w-full max-w-lg">
        <div class="flex justify-between items-center mb-4">
          <h3 class="text-lg font-bold">Edit User - <?= htmlspecialchars($user['username']) ?></h3>
          <button onclick="closeModal('editModal<?= $user['id'] ?>')">&times;</button>
        </div>
        <form method="POST" action="?page=administrative_user_edit">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" class="w-full mb-2 border p-2 rounded">
          <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="w-full mb-2 border p-2 rounded">
          <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" class="w-full mb-2 border p-2 rounded">
          <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" class="w-full mb-2 border p-2 rounded">
          <select name="role" class="w-full mb-4 border p-2 rounded">
            <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Client</option>
            <option value="vet" <?= $user['role'] === 'vet' ? 'selected' : '' ?>>Vet</option>
            <option value="receptionist" <?= $user['role'] === 'receptionist' ? 'selected' : '' ?>>Receptionist</option>
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
          </select>
          <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Update User</button>
        </form>
      </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal<?= $user['id'] ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
      <div class="bg-white p-6 rounded-lg w-full max-w-md text-center">
        <h3 class="text-xl font-bold text-red-600 mb-4">Delete User</h3>
        <p class="mb-4">Are you sure you want to delete <strong><?= htmlspecialchars($user['name']) ?></strong>?</p>
        <form method="POST" action="?page=administrative_user_delete">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <div class="flex justify-center gap-4">
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
            <button type="button" onclick="closeModal('deleteModal<?= $user['id'] ?>')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  <?php endforeach; ?>
</body>
</html>
