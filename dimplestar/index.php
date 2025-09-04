<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dimplestar Bus Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow-md fixed w-full top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-6 py-4">
      <!-- Logo -->
      <a href="index.php" class="text-2xl font-bold text-blue-600">Dimplestar</a>

      <!-- Menu -->
      <div class="hidden md:flex space-x-6 font-medium">
        <a href="index.php" class="hover:text-blue-600">Home</a>
        <a href="about.php" class="hover:text-blue-600">About Us</a>
        <a href="terminal.php" class="hover:text-blue-600">Terminals</a>
        <a href="routeschedule.php" class="hover:text-blue-600">Routes / Schedules</a>
        <a href="contact.php" class="hover:text-blue-600">Contact</a>
        <a href="book.php" class="text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700">Book Now</a>
      </div>

      <!-- Auth buttons -->
      <div class="hidden md:flex space-x-4">
        <a href="login.php" class="px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">Login</a>
        <a href="signlog.php" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Sign Up</a>
      </div>

      <!-- Mobile menu button -->
      <button id="menu-btn" class="md:hidden text-gray-700 focus:outline-none text-2xl">
        ☰
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="menu" class="hidden md:hidden bg-white px-6 pb-4 space-y-3">
      <a href="index.php" class="block hover:text-blue-600">Home</a>
      <a href="about.php" class="block hover:text-blue-600">About Us</a>
      <a href="terminal.php" class="block hover:text-blue-600">Terminals</a>
      <a href="routeschedule.php" class="block hover:text-blue-600">Routes / Schedules</a>
      <a href="contact.php" class="block hover:text-blue-600">Contact</a>
      <a href="book.php" class="block text-white bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700">Book Now</a>
      <a href="login.php" class="block px-4 py-2 border border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50">Login</a>
      <a href="signlog.php" class="block px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Sign Up</a>
    </div>
  </nav>

  <!-- Hero Section with Carousel -->
  <section class="relative h-screen overflow-hidden">
    <div class="relative w-full h-full">
      <!-- Slides -->
      <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-1000">
        <img src="slide/images/b1.png" class="w-full h-full object-cover" alt="Slide 1">
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
        <img src="slide/images/b2.png" class="w-full h-full object-cover" alt="Slide 2">
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
        <img src="slide/images/b3.png" class="w-full h-full object-cover" alt="Slide 3">
      </div>
      <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
        <img src="slide/images/b4.png" class="w-full h-full object-cover" alt="Slide 3">
      </div>


      <!-- Overlay text -->
      <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white bg-black/40 px-6">
        <h1 class="text-4xl md:text-6xl font-bold mb-6">Safe, Reliable, and Comfortable Bus Travel</h1>
        <p class="text-lg md:text-xl mb-8">Connecting you to your destinations with ease and convenience.</p>
        <a href="book.php" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700">Book Your Trip Now</a>
      </div>

      <!-- Controls -->
      <button id="prevBtn" class="absolute left-5 top-1/2 -translate-y-1/2 bg-black/40 text-white p-3 rounded-full hover:bg-black/70">❮</button>
      <button id="nextBtn" class="absolute right-5 top-1/2 -translate-y-1/2 bg-black/40 text-white p-3 rounded-full hover:bg-black/70">❯</button>

      <!-- Indicators -->
      <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3">
        <span class="carousel-indicator w-3 h-3 bg-white rounded-full cursor-pointer opacity-80"></span>
        <span class="carousel-indicator w-3 h-3 bg-white rounded-full cursor-pointer opacity-50"></span>
        <span class="carousel-indicator w-3 h-3 bg-white rounded-full cursor-pointer opacity-50"></span>
        <span class="carousel-indicator w-3 h-3 bg-white rounded-full cursor-pointer opacity-50"></span>
      </div>
    </div>
  </section>

  <!-- Scripts -->
  <script>
    // Mobile menu toggle
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu');
    menuBtn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });

    // Carousel functionality
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');
    let currentIndex = 0;
    let interval = setInterval(nextSlide, 5000); // Auto-slide every 5s

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.opacity = (i === index) ? '1' : '0';
      });
      indicators.forEach((dot, i) => {
        dot.classList.toggle('opacity-80', i === index);
        dot.classList.toggle('opacity-50', i !== index);
      });
      currentIndex = index;
    }

    function nextSlide() {
      let newIndex = (currentIndex + 1) % slides.length;
      showSlide(newIndex);
    }

    function prevSlide() {
      let newIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(newIndex);
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
      nextSlide();
      resetInterval();
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
      prevSlide();
      resetInterval();
    });

    indicators.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        showSlide(i);
        resetInterval();
      });
    });

    function resetInterval() {
      clearInterval(interval);
      interval = setInterval(nextSlide, 5000);
    }

    // Show first slide on load
    showSlide(currentIndex);
  </script>

</body>
</html>
