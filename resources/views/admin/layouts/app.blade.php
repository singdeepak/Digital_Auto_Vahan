<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Font Awesome CDN -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
  />

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex flex-col min-h-screen ">

  <!-- Success Message Alert -->
  @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: 'success',
          title: 'Success',
          text: "{{ session('success') }}",
          timer: 3000,
          showConfirmButton: false
        });
      });
    </script>
  @endif

  <!-- Error Message Alert -->
  @if(session('error'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: "{{ session('error') }}",
          timer: 3000,
          showConfirmButton: false
        });
      });
    </script>
  @endif

  <!-- Header -->
  @include('admin.layouts.header')
  
  <!-- Main Content Area -->
  <div class="flex flex-1">
    @include('admin.layouts.sidebar')
    <main class="flex-1 overflow-auto">
      <div class="p-6">
        @yield('content')
      </div>
    </main>
  </div>
  
  @include('admin.layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>

  <script>
    $(document).ready(function() {
      if (typeof $.validator === 'undefined') {
        console.error('jQuery Validate plugin failed to load');
        return;
      }
      
      if (typeof $.validator.methods.extension === 'undefined') {
        console.warn('Additional validation methods may not have loaded');
      }
      
    });
  </script>

  @stack('script')

</body>
</html>