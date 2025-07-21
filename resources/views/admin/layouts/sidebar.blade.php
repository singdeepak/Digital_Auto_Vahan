<aside class="w-64 h-screen bg-indigo-600 shadow-lg text-white">
  <div class="p-6 font-bold text-2xl tracking-wide">
    Dashboard
  </div>
  <nav class="mt-6 space-y-2">
    <a href="{{ route('admin.dashboard') }}"
       class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-indigo-500
              {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-500' : '' }}">
      Dashboard
    </a>

    <a href="{{ route('request.create') }}"
       class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-indigo-500
              {{ request()->routeIs('request.create') ? 'bg-indigo-500' : '' }}">
      New Request
    </a>

    <a href="{{ route('request.fresh') }}"
       class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-indigo-500
              {{ request()->routeIs('request.fresh') ? 'bg-indigo-500' : '' }}">
      Fresh Request
    </a>
    <a href="{{ route('request.fetch') }}"
       class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-indigo-500
              {{ request()->routeIs('request.fetch') ? 'bg-indigo-500' : '' }}">
      Assigned Request
    </a>
    <a href="{{ route('request.completed') }}"
       class="block px-4 py-2 rounded-lg transition-colors duration-200 hover:bg-indigo-500
              {{ request()->routeIs('request.completed') ? 'bg-indigo-500' : '' }}">
      Completed
    </a>
  </nav>
</aside>


</aside>
