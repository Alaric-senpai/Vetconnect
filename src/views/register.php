<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>REgister - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 flex items-center justify-center p-4">

  <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-2xl space-y-7 transform transition-all duration-300 hover:scale-105 hover:shadow-3xl">
    <h1 class="text-3xl font-extrabold text-center text-blue-700 tracking-tight">VetConnect Login</h1>
    <p class="text-base text-center text-gray-600 leading-relaxed">Manage veterinary services with ease and efficiency.</p>

    <?php if (!empty($flash)): ?>
      <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg text-sm border border-green-200 flex items-center space-x-2">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
        <span><?= htmlspecialchars($flash) ?></span>
      </div>
    <?php endif; ?>

        <form method="POST" action="?page=register_submit" class="space-y-6">

        <div>
            <label for="name" class="block mb-2 text-sm font-semibold text-gray-800">Full Name</label>
            <input type="text" id="name" name="name" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter your full name" />
        </div>

        <div>
            <label for="username" class="block mb-2 text-sm font-semibold text-gray-800">Username</label>
            <input type="text" id="username" name="username"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Optional username" />
        </div>

        <div>
            <label for="email" class="block mb-2 text-sm font-semibold text-gray-800">Email Address</label>
            <input type="email" id="email" name="email"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Optional email" />
        </div>

        <div>
            <label for="phone" class="block mb-2 text-sm font-semibold text-gray-800">Phone Number</label>
            <input type="text" id="phone" name="phone"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Optional phone number" />
        </div>

        <div>
            <label for="address" class="block mb-2 text-sm font-semibold text-gray-800">Address</label>
            <textarea id="address" name="address"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Optional address"></textarea>
        </div>

        <div>
            <label for="password" class="block mb-2 text-sm font-semibold text-gray-800">Password</label>
            <input type="password" id="password" name="password" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Create a password" />
        </div>

        <div>
            <label for="confirm_password" class="block mb-2 text-sm font-semibold text-gray-800">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Repeat your password" />
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105 active:scale-95">
            Register
        </button>
        </form>


    <p class="text-sm text-gray-500 text-center mt-6">VetConnect © <?= date('Y') ?></p>
  </div>

</body>
</html>