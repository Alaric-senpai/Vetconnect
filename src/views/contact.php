<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us - VetConnect</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="icon" href="assets/images/favicon.png" type="image/png">
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-100 font-sans antialiased text-gray-800">

  <?php require_once __DIR__ . '/../shared/Navbar.php'; ?>

  <main class="max-w-4xl mx-auto px-6 py-16">
    <h1 class="text-4xl font-extrabold text-blue-800 mb-4 drop-shadow-sm">Contact Us</h1>
    <p class="text-lg text-gray-700 mb-10 leading-relaxed">
      We'd love to hear from you! Whether you have questions, feedback, or need support, the VetConnect team is here to help.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div>
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Reach Us Directly</h2>
        <p class="mb-2 text-gray-700"><strong>Email:</strong> <a href="mailto:support@vetconnect.com" class="text-blue-600 hover:underline">support@vetconnect.com</a></p>
        <p class="mb-2 text-gray-700"><strong>Phone:</strong> +254 712 345 678</p>
        <p class="mb-2 text-gray-700"><strong>Address:</strong> VetConnect HQ, Nairobi, Kenya</p>
        <p class="text-gray-600 mt-4">Our support team is available Mon–Fri, 9:00AM–5:00PM EAT.</p>
      </div>

      <div>
        <h2 class="text-2xl font-bold text-blue-700 mb-4">Send Us a Message</h2>
        <form action="#" method="post" class="space-y-4">
          <input type="text" name="name" placeholder="Your Name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          <input type="email" name="email" placeholder="Your Email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
          <textarea name="message" rows="4" placeholder="Your Message" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
          <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-shadow shadow-md hover:shadow-lg">Send Message</button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>
