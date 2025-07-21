<!DOCTYPE html>
<html lang="en">
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>window.$ = window.jQuery;</script>

  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>

  @vite(['resources/css/app.css','resources/js/app.js'])

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="flex flex-col min-h-screen bg-gray-200">

  @if(session('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 3000,
        showConfirmButton: false
      });
    </script>
  @endif

  @if(session('error'))
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: "{{ session('error') }}",
        timer: 3000,
        showConfirmButton: false
      });
    </script>
  @endif


  @include('admin.layouts.header')
  <div class="flex flex-1 bg-white-900">
    @include('admin.layouts.sidebar')
    <main class="flex-1 overflow-auto">
      <div class="p-6">
        @yield('content')
      </div>
    </main>
  </div>
  @include('admin.layouts.footer')

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>window.$ = window.jQuery;</script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.5/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function () {
        // Custom rule: alphabets only
        $.validator.addMethod("lettersonly", function (value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Client name must contain only letters");

        $('#requestForm').validate({
            rules: {
                reg_number: {
                    required: true,
                    minlength: 4
                },
                client_name: {
                    required: true,
                    minlength: 3,
                    lettersonly: true // use custom rule here
                },
                fop_type: {
                    required: true
                }
            },
            messages: {
                reg_number: {
                    required: "Please enter registration number",
                    minlength: "At least 4 characters required"
                },
                client_name: {
                    required: "Please enter client name",
                    minlength: "At least 3 characters required",
                    lettersonly: "Client name must contain only letters"
                },
                fop_type: {
                    required: "Please enter FOP type"
                }
            },
            errorElement: 'p',
            errorClass: 'text-red-600 text-sm mt-1',
            highlight: function (element) {
                $(element).addClass('border-red-500');
            },
            unhighlight: function (element) {
                $(element).removeClass('border-red-500');
            }
        });
    });
  </script>

</body>
</html>
