<header class="sticky top-0 z-50 flex items-center w-full min-h-16 px-4 py-2 ">
  <nav class="flex flex-1 items-center justify-between max-w-7xl mx-auto">
    <div class="text-2xl font-extrabold text-blue-700 tracking-tight drop-shadow-sm">
      VetConnect
    </div>

    <div class="flex space-x-6">
      <a href="?page=home" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 relative group">
        Home
        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
      </a>
      <a href="?page=about" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 relative group">
        About
        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
      </a>
      <a href="?page=contact" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 relative group">
        Contact
        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
      </a>
      <!-- <a href="?page=home" class="text-gray-700 hover:text-blue-600 font-medium transition-colors duration-300 relative group">
        Blog
        <span class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-500 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
      </a> -->
      </div>

    <div class="flex items-center space-x-3">
      <a href="?page=login" class="px-6 py-2 rounded-full bg-blue-600 text-white font-semibold text-sm shadow-md hover:bg-blue-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
        Login
      </a>
      <a href="?page=signup" class="px-6 py-2 rounded-full bg-green-600 text-white font-semibold text-sm shadow-md hover:bg-green-700 hover:shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-75">
        Signup
      </a>
    </div>
  </nav>
</header>

<script lang="js">
  const header = document.querySelector('header');

  // Add initial blur and semi-transparent background
  header.classList.add('bg-white/45', 'backdrop-blur-md');

  // Scroll event to add shadow
  window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
      header.classList.add('shadow-md', 'bg-white'); // solid background + shadow
    } else {
      header.classList.remove('shadow-md', 'bg-white'); // remove shadow and keep original bg
    }
  });
</script>
