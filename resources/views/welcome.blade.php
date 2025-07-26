<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login</title>
  @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center bg-login bg-cover bg-center relative">
  <div class="absolute inset-0 bg-black bg-opacity-50"></div>

  <div class="relative z-10 w-full max-w-md p-8 bg-white bg-opacity-80 backdrop-blur-md rounded-2xl shadow-lg">
    <div class="text-center mb-6">
      <img src="{{ asset('logo.jpg') }}" alt="Admin Panel Logo" class="mx-auto w-20 h-auto">
    </div>


    @if(session('error'))
      <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
        {{ session('error') }}
      </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
      @csrf
      <div>
        <label for="email" class="block text-sm text-gray-700">Email address</label>
        <input type="email" name="email" id="email"
          value="{{ old('email') }}" required autofocus
          class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>
      <div>
        <label for="password" class="block text-sm text-gray-700">Password</label>
        <input type="password" name="password" id="password"
          required
          class="w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
      </div>
      <button type="submit"
        class="w-full py-2 text-white bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold transition duration-300 cursor-pointer">
        Log In
      </button>
    </form>
  </div>
</body>
</html>
