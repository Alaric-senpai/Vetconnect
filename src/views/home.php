<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>VetConnect - Your Pet's Best Friend</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="icon" href="assets/images/favicon.png" type="image/png"> </head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-100 font-sans antialiased text-gray-800">

<?php require_once __DIR__. '/../shared/Navbar.php' ?>

<section class="w-full min-h-screen h-max relative overflow-hidden flex items-center justify-center">
  <img src="assets/images/vet-main.jpg" alt="Main Vet Background" class="absolute top-0 left-0 w-full h-full object-cover">
  
  <div class="absolute inset-0 bg-black/30 backdrop-blur-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 z-10">
    <div class="h-full w-full p-6 lg:col-span-2 flex flex-col justify-center text-white">
      <div class="mb-5 md:mb-6">
        <span class="inline-flex items-center px-4 py-2 bg-yellow-400/80 text-blue-900 font-semibold text-sm border border-yellow-300 rounded-full shadow-md animate-pulse-custom">
          <span class="w-2.5 h-2.5 mr-2 rounded-full bg-blue-600 animate-ping-slow"></span>
          Trusted Veterinarian Care
        </span>
      </div>

      <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight mb-5 md:mb-6 text-shadow-lg">
        Treat Your Pet With Our Professional Vets
      </h1>

      <p class="text-lg md:text-xl leading-relaxed mb-8 max-w-xl text-shadow-md">
        VetConnect: here for love, health, and happiness — your first visit is on us! We can't wait to meet you both and give your pet the best care.
      </p>

      <a href="?page=login&redirect_to=appointment" class="inline-flex items-center justify-center px-8 py-4 bg-gradient-to-br from-amber-500 to-amber-600 text-white font-bold text-lg rounded-full shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 active:scale-95 ease-out">
        Book Your Free Appointment
        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
      </a>

      <div aria-label="stat-cards" class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-6">
        <div class="bg-white/30 backdrop-blur-sm border border-white/50 rounded-xl flex items-center justify-center flex-col p-5 gap-2 shadow-md">
          <h2 class="text-4xl font-extrabold text-white drop-shadow-md">56K+</h2>
          <p class="font-medium text-lg text-white/90">Happy Clients</p>
        </div>
        <div class="bg-white/30 backdrop-blur-sm border border-white/50 rounded-xl flex items-center justify-center flex-col p-5 gap-2 shadow-md">
          <h2 class="text-4xl font-extrabold text-white drop-shadow-md">72+</h2>
          <p class="font-medium text-lg text-white/90">Expert Employees</p>
        </div>
        <div class="bg-white/30 backdrop-blur-sm border border-white/50 rounded-xl flex items-center justify-center flex-col p-5 gap-2 shadow-md">
          <h2 class="text-4xl font-extrabold text-white drop-shadow-md">99%</h2>
          <p class="font-medium text-lg text-white/90">Client Satisfaction</p>
        </div>
      </div>
    </div>

    <div class="hidden md:block lg:col-span-1 relative">
      <img src="assets/images/lady-vet.jpg" alt="Vet with pet" class="w-full h-full object-cover">

      <div aria-label="doctor-snip" class="bg-white/90 backdrop-blur-md absolute bottom-12 right-12 rounded-xl p-5 shadow-xl flex items-center gap-4 border border-gray-100 transform hover:scale-105 transition-transform duration-300">
        <img src="assets/images/doc-avatar.jpg" alt="Doctor Charles" class="w-14 h-14 rounded-full object-cover border-2 border-blue-300">
        <div>
          <h3 class="text-lg font-bold text-gray-900">Dr. Charles Green</h3>
          <p class="text-sm text-gray-600">Chief Medical Officer</p>
        </div>
      </div>

      <div class="bg-white/90 backdrop-blur-md absolute top-12 left-12 rounded-xl shadow-xl p-5 flex items-center gap-4 max-w-xs border border-gray-100 transform hover:scale-105 transition-transform duration-300">
        <img src="assets/images/pet-vet.jpg" alt="Pet Consultation" class="w-20 h-20 rounded-lg object-cover border-2 border-green-300">
        <div>
          <h3 class="font-bold text-lg text-gray-900">Personalized Consults</h3>
          <p class="text-sm text-gray-600">Get expert advice tailored for your pet's health and happiness.</p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="py-20 bg-gray-50">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-4xl font-extrabold text-blue-700 mb-4">Our Compassionate Services</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-12">
      We offer a full range of veterinary services to keep your beloved companions healthy and thriving.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-xl shadow-lg border border-blue-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-blue-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Preventative Care</h3>
        <p class="text-gray-700">Routine check-ups, vaccinations, and wellness programs to ensure long-term health.</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-green-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-green-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.001 12.001 0 002.928 12c.045 1.5.348 2.92.872 4.226M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3v4l3 2"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Emergency & Urgent Care</h3>
        <p class="text-gray-700">24/7 critical care for unexpected injuries or sudden illnesses.</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-purple-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-purple-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Surgery & Dentistry</h3>
        <p class="text-gray-700">Advanced surgical procedures and comprehensive dental care for optimal health.</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-yellow-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-yellow-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l12-3v13M9 19c0 1.105-1.79 2-4 2s-4-.895-4-2m4 0l-2-1m-4-10v5m6-10V4m-6 0a2 2 0 100 4m0-4a2 2 0 110 4m0 0H9m2-4a2 2 0 100 4m0-4a2 2 0 110 4m0 0h3m-3 10v-3m6 3v-3m-6 3h.01M18 19V6l-6-3v13m6 0a2 2 0 100 4m0-4a2 2 0 110 4m0 0H9m-2 4a2 2 0 100 4m0-4a2 2 0 110 4m0 0h3m-3 10v-3m6 3v-3m-6 3h.01M18 19V6l-6-3v13"></path>
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Advanced Diagnostics</h3>
        <p class="text-gray-700">Utilizing state-of-the-art imaging and lab tests for accurate diagnoses.</p>
      </div>
       <div class="bg-white p-8 rounded-xl shadow-lg border border-red-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-red-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Nutrition & Weight Management</h3>
        <p class="text-gray-700">Personalized dietary plans and support for your pet's ideal health.</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-pink-100 transform hover:scale-105 transition-all duration-300 group">
        <div class="text-pink-500 mb-4 text-5xl group-hover:text-amber-500 transition-colors duration-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636a9 9 0 010 12.728m0 0l-1.414-1.414m1.414 1.414L12 21.657l-.707-.707L6.343 16.92c-2.193-2.194-2.193-5.746 0-7.94a4.5 4.5 0 016.364 0l.707.707.707-.707a4.5 4.5 0 016.364 0z" />
          </svg>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-3">Behavioral Counseling</h3>
        <p class="text-gray-700">Expert guidance to address and resolve common pet behavioral challenges.</p>
      </div>
    </div>
  </div>
</section>


<section class="py-20 bg-blue-50">
  <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="relative rounded-2xl overflow-hidden shadow-xl border-4 border-blue-200">
      <img src="assets/images/vet-main.jpg" alt="Happy pet with vet" class="w-full h-full object-cover">
      <div class="absolute inset-0 bg-blue-900/10 backdrop-blur-sm"></div>
    </div>
    <div class="text-center md:text-left">
      <h2 class="text-4xl font-extrabold text-green-700 mb-6 leading-tight">Why Choose VetConnect for Your Beloved Pet?</h2>
      <ul class="space-y-6 text-lg text-gray-700">
        <li class="flex items-start md:items-center">
          <svg class="w-8 h-8 text-amber-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          <span>**Experienced & Caring Team:** Our veterinarians and staff are highly skilled and genuinely passionate about animals.</span>
        </li>
        <li class="flex items-start md:items-center">
          <svg class="w-8 h-8 text-amber-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          <span>**State-of-the-Art Facilities:** Equipped with the latest technology for accurate diagnoses and effective treatments.</span>
        </li>
        <li class="flex items-start md:items-center">
          <svg class="w-8 h-8 text-amber-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          <span>**Personalized Treatment Plans:** Tailored care designed specifically for your pet's unique needs and health goals.</span>
        </li>
        <li class="flex items-start md:items-center">
          <svg class="w-8 h-8 text-amber-500 mr-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
          <span>**Convenient Online Booking:** Easily schedule appointments from the comfort of your home, any time.</span>
        </li>
      </ul>
    </div>
  </div>
</section>


<section class="py-20 bg-gradient-to-br from-purple-50 to-blue-50">
  <div class="max-w-6xl mx-auto px-4 text-center">
    <h2 class="text-4xl font-extrabold text-blue-700 mb-4">What Our Happy Clients Say</h2>
    <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-12">
      Hear directly from the pet parents who trust VetConnect with their furry family members.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-xl shadow-lg border border-blue-100 flex flex-col items-center">
        <img src="assets/images/client1.jpg" alt="Client Avatar 1" class="w-20 h-20 rounded-full object-cover mb-4 border-4 border-blue-300">
        <p class="text-gray-700 italic mb-4">"VetConnect has been a lifesaver for my dog, Max! The vets are incredibly knowledgeable and genuinely care. Highly recommend their compassionate approach!"</p>
        <p class="font-bold text-gray-900">- Sarah L. & Max</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-green-100 flex flex-col items-center">
        <img src="assets/images/client2.jpg" alt="Client Avatar 2" class="w-20 h-20 rounded-full object-cover mb-4 border-4 border-green-300">
        <p class="text-gray-700 italic mb-4">"The team at VetConnect is fantastic. They made my cat's check-up so stress-free. So grateful for their gentle approach and thorough explanations."</p>
        <p class="font-bold text-gray-900">- David P. & Whiskers</p>
      </div>
      <div class="bg-white p-8 rounded-xl shadow-lg border border-purple-100 flex flex-col items-center">
        <img src="assets/images/client3.jpg" alt="Client Avatar 3" class="w-20 h-20 rounded-full object-cover mb-4 border-4 border-purple-300">
        <p class="text-gray-700 italic mb-4">"From urgent care to routine visits, VetConnect always delivers top-notch service. The online booking is super convenient and their follow-up is great!"</p>
        <p class="font-bold text-gray-900">- Emily R. & Bella</p>
      </div>
    </div>
  </div>
</section>


<section class="py-20 bg-gradient-to-br from-amber-500 to-red-500 text-white text-center">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight drop-shadow-lg">
      Ready to Give Your Pet the Best Care?
    </h2>
    <p class="text-lg md:text-xl mb-10 max-w-2xl mx-auto text-shadow-md">
      Join the VetConnect family today and experience compassionate, expert veterinary services designed for your peace of mind.
    </p>
    <div class="flex flex-col sm:flex-row justify-center gap-6">
      <a href="?page=signup" class="inline-flex items-center justify-center px-10 py-5 bg-white text-amber-600 font-bold text-xl rounded-full shadow-2xl hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 active:scale-95 ease-out">
        Get Started Today
        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
      </a>
      <a href="?page=contact" class="inline-flex items-center justify-center px-10 py-5 border-2 border-white text-white font-bold text-xl rounded-full shadow-lg hover:bg-white hover:text-amber-600 transition-all duration-300 transform hover:scale-105 active:scale-95 ease-out">
        Contact Us
        <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684L10.25 8.354l-4.22 2.813a1 1 0 00-.322 1.48L9 16l3-3m0 0l-3 3m0-3h6"></path></svg>
      </a>
    </div>
  </div>
</section>


</body>
</html>