<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>About VetConnect - Your Pet's Best Friend</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-100 font-sans antialiased text-gray-800">

  <?php require_once __DIR__ . '/../shared/Navbar.php'; ?>

  <main class="max-w-5xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-extrabold text-blue-800 mb-4 drop-shadow-sm">About VetConnect</h1>
    <p class="text-lg text-gray-700 mb-8 leading-relaxed">
      <strong>VetConnect</strong> is your trusted digital companion for managing pet healthcare. Whether you're a pet owner booking appointments or a veterinarian managing records, VetConnect simplifies the entire experience.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-bold text-blue-700 mb-2">For Pet Owners</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li>Quickly register your pets and manage their profiles</li>
          <li>Book and track veterinary appointments online</li>
          <li>Access medical records and vaccination history</li>
          <li>Get reminders for upcoming appointments</li>
        </ul>
      </div>

      <div>
        <h2 class="text-2xl font-bold text-blue-700 mb-2">For Veterinarians</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li>Manage appointments and assign vets easily</li>
          <li>Track patient medical records and add notes</li>
          <li>View client and pet history at a glance</li>
          <li>Streamline clinic operations from one dashboard</li>
        </ul>
      </div>
    </div>

    <div class="mt-12">
      <h2 class="text-2xl font-bold text-blue-700 mb-2">Our Mission</h2>
      <p class="text-gray-700 leading-relaxed">
        At VetConnect, our mission is to enhance the relationship between pets, their owners, and veterinary professionals by providing a seamless, user-friendly platform that keeps everyone connected and informed.
      </p>
    </div>

    <div class="mt-12">
      <h2 class="text-2xl font-bold text-blue-700 mb-2">Contact Us</h2>
      <p class="text-gray-700">Have questions or feedback? Reach out at <a href="mailto:support@vetconnect.com" class="text-blue-600 hover:underline">support@vetconnect.com</a></p>
    </div>
  </main>

</body>
</html>
