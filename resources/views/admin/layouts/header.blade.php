<header class="w-full bg-indigo-600 text-white p-4 flex items-center justify-between shadow-md">
  <div>
    <img src="{{ asset('logo.jpg') }}" alt="Digital Auto – Vahan" class="w-32 h-16 object-contain">
  </div>


  <div class="flex items-center space-x-4">
    <span class="hidden md:inline">Hello, Admin</span>
    <!-- Logout button -->
    <form method="POST" action="{{ route('admin.logout') }}">
      @csrf
      <button type="submit"
        class="px-4 py-2 bg-white text-blue-600 font-semibold rounded-md hover:bg-gray-100 transition">
        Logout
      </button>
    </form>
  </div>
</header>
