<!-- Navigation Bar -->
<nav class="bg-white shadow-md px-6 py-4 w-full fixed top-0 left-0 z-50">
  <div class="container mx-auto flex justify-between items-center">

    <!-- Left Section: Logo + Cart -->
    <div class="flex items-center space-x-6">
      <a href="#" class="text-xl font-bold text-blue-600">E_Commerce</a>
      <?php if(isset($_SESSION['user']) &&$_SESSION['role']!='admin' ):?>
        <a href="/cart" class="hover:text-blue-500 font-medium">Cart</a>
      <?php endif?>
    </div>

    <!-- Right Section: Navigation Links -->
    <div class="space-x-6 text-gray-700 hidden md:flex items-center">
      <a href="/home" class="hover:text-blue-600 font-medium">Home</a>
      <a href="/profile" class="hover:text-blue-600 font-medium">Profile</a>
      <a href="/logout" class="hover:text-red-500 font-medium">Logout</a>
    </div>

    <!-- Mobile Menu Icon -->
    <div class="md:hidden">
      <button id="menu-btn" class="text-gray-700 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <path d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>
  </div>
</nav>


  <!-- Script to Toggle Mobile Menu -->
  <script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    menuBtn.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
