<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add New User - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-blue-100 min-h-screen md:p-6  ">

<?php require_once __DIR__ . "/../shared/miniheader.php"; ?>

<div class="bg-white rounded-xl shadow-2xl border border-emerald-400 w-full container grid grid-cols-1 md:grid-cols-2  m-auto  overflow-hidden">

  <!-- Left Column -->
  <div class="bg-gradient-to-br from-emerald-200 to-blue-200 p-8 flex flex-col justify-center items-center text-center">
    <img src="assets/images/vetconnect2.png" alt="VetConnect Logo" class="w-32 h-32 rounded-full border-4 border-white shadow mb-6">
    <h2 class="text-3xl font-bold text-emerald-800 mb-2">Welcome to VetConnect</h2>
    <p class="text-gray-700 text-sm max-w-sm">
      Register a new user account to access pet care services, schedule appointments, or manage clinic operations.
    </p>
  </div>

  <!-- Right Column -->
  <div class="p-8">
    <h3 class="text-2xl font-semibold text-emerald-700 mb-6">Add New User</h3>

    <form method="post" action="?page=administrative_user_add" class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
        <input type="text" name="name" required class="w-full border rounded-lg p-2 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
        <input type="text" name="username" required class="w-full border rounded-lg p-2 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" class="w-full border rounded-lg p-2 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
        <input type="text" name="phone" class="w-full border rounded-lg p-2 shadow-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
        <input type="text" name="address" class="w-full border rounded-lg p-2 shadow-sm">
      </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Default password</label>
        <input type="text" name="password" class="w-full border rounded-lg p-2 shadow-sm"  value="account@vetconnect" readonly id="password">
      </div>

      <!-- Default Password (Hidden) -->

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
        <select name="role" required class="w-full border rounded-lg p-2 shadow-sm">
          <option value="client">Client</option>
          <option value="vet">Vet</option>
          <option value="receptionist">Receptionist</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button type="submit" class="w-full bg-emerald-600 text-white py-2 rounded-lg hover:bg-emerald-700 transition-all">
        Create User
      </button>
    </form>
  </div>

</div>
</body>
</html>
