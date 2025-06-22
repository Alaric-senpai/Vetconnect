<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

  
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-100 to-purple-200 ">


  <div class="grid grid-cols-1 md:grid-cols-2 h-screen min-h-screen">
    <!-- left side -->
    <div class="w-full h-full bg-gradient-to-br from-slate-800 to-slate-700 relative bg-image bg-fixed p-5 hidden md:block">
        <a href="?page=home" class="w-24 bg-teal-500 rounded-md p-3 px-4 text-white shadow-md hover:shadow-lg duration-300 ease-linear transition-all ">
          <?php
            echo icon('material-symbols:arrow-left')
          ?>
          Go back
        </a>
        <!-- absolute top-1/2 left-1/2 centered box -->
        <div class="p-5 bg-white/45 backdrop-blur-md rounded-md shadow-md hover:shadow-lg transition-all duration-300 ease-linear border border-white flex items-center justify-center flex-col
        mt-5  m-auto relative top-1/2 -translate-y-1/2 ">
          <img src="assets/images/vetconnect.png" alt="logo 2" class="aspect-square w-28 rounded-full">

          <h1 class="text-gray-900 text-center italic text-xl my-5">
            VetConnect
          </h1>

          <div class="p-1 bg-teal-500 h-2 w-full rounded-md">
            
          </div>
          <p class="my-5 text-gray-600 italic text-center">
            Simplifying your pet's healthcare
          </p>

        </div>
    </div>
    <!-- right side -->
    <div class="w-full h-full p-8 bg-white rounded-xl shadow-2xl space-y-7 flex flex-col items-center justify-between transform transition-all duration-300  hover:shadow-3xl">
              <a href="?page=home" class="w-full text-center bg-teal-500 rounded-md p-3 px-4 text-white shadow-md hover:shadow-lg duration-300 ease-linear transition-all md:hidden ">
          <?php
            echo icon('material-symbols:arrow-left')
          ?>
          Go back
        </a>
      <h1 class="text-3xl font-extrabold text-center text-blue-700 tracking-tight">VetConnect Login</h1>
      <p class="text-base text-center text-gray-600 leading-relaxed">Forgot your password? No worries .</p>
  
      <?php if (!empty($flash)): ?>
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg text-sm border border-green-200 flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
          <span><?= htmlspecialchars($flash) ?></span>
        </div>
      <?php endif; ?>
  
      <form method="POST" action="" class="space-y-6 w-full">
        <div>
          <label for="email" class="block mb-2 text-sm font-semibold text-gray-800">Email Addeess</label>
          <input type="email" id="email" name="email" required
                 class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                 placeholder="Enter your email address" />
        </div>
  
        <!-- <div>
          <label for="password" class="block mb-2 text-sm font-semibold text-gray-800">Password</label>
          <input type="password" id="password" name="password" required
                 class="w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                 placeholder="Enter your password" />
        </div> -->
  
        <button type="submit"
                class="w-full bg-blue-600 text-white font-bold py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75 transition-all duration-200 transform hover:scale-105 active:scale-95">
          Send password reset email
        </button>
        <p class="w-full p-3 italic text-center font-light">
          New to VetConnect? <a href="?page=signup" class="text-blue-500 hover:text-purple-500 transition-colors duration-300 ease-linear">Create an account here</a>
        </p>
      </form>
  
      <p class="text-sm text-gray-500 text-center mt-6">VetConnect © <?= date('Y') ?></p>
    </div>
  </div>



</body>
</html>