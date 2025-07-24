<aside class="w-74 h-screen bg-indigo-600 shadow-lg text-white flex flex-col">
  <div class="p-6 font-bold text-2xl tracking-wide text-red-900">
    Digital Auto Vahan
  </div>
  <nav class="mt-4 flex-1 space-y-1 overflow-y-auto">
    <a href="{{ route('admin.dashboard') }}"
       @class([
         'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-200',
         'bg-indigo-500' => request()->routeIs('admin.dashboard'),
         'hover:bg-indigo-500' => !request()->routeIs('admin.dashboard')
       ])>
      <i class="fas fa-home text-lg"></i>
      <span class="flex-1">Dashboard</span>
      @if(request()->routeIs('admin.dashboard'))
        <span class="w-1 h-6 bg-white rounded-r-full"></span>
      @endif
    </a>

    <a href="{{ route('request.create') }}"
       @class([
         'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-200',
         'bg-indigo-500' => request()->routeIs('request.create'),
         'hover:bg-indigo-500' => !request()->routeIs('request.create')
       ])>
      <i class="fas fa-plus-circle text-lg"></i>
      <span class="flex-1">New Request</span>
      @if(request()->routeIs('request.create'))
        <span class="w-1 h-6 bg-white rounded-r-full"></span>
      @endif
    </a>

    <a href="{{ route('request.fresh') }}"
       @class([
         'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-200',
         'bg-indigo-500' => request()->routeIs('request.fresh'),
         'hover:bg-indigo-500' => !request()->routeIs('request.fresh')
       ])>
      <i class="fas fa-clipboard-list text-lg"></i>
      <span class="flex-1">Fresh Request</span>
      @if(request()->routeIs('request.fresh'))
        <span class="w-1 h-6 bg-white rounded-r-full"></span>
      @endif
    </a>

    <a href="{{ route('request.fetch') }}"
       @class([
         'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-200',
         'bg-indigo-500' => request()->routeIs('request.fetch'),
         'hover:bg-indigo-500' => !request()->routeIs('request.fetch')
       ])>
      <i class="fas fa-handshake text-lg"></i>
      <span class="flex-1">Assigned Request</span>
      @if(request()->routeIs('request.fetch'))
        <span class="w-1 h-6 bg-white rounded-r-full"></span>
      @endif
    </a>

    <a href="{{ route('request.completed') }}"
       @class([
         'flex items-center gap-3 px-4 py-2 rounded-lg transition-colors duration-200',
         'bg-indigo-500' => request()->routeIs('request.completed'),
         'hover:bg-indigo-500' => !request()->routeIs('request.completed')
       ])>
      <i class="fas fa-check-circle text-lg"></i>
      <span class="flex-1">Completed</span>
      @if(request()->routeIs('request.completed'))
        <span class="w-1 h-6 bg-white rounded-r-full"></span>
      @endif
    </a>
  </nav>
</aside>
