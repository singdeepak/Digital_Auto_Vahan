@extends('admin.layouts.app')

@section('content')
  <div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">Dashboard Overview</h1>

    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
      {{-- Total Requests --}}
      <div class="bg-gradient-to-br from-blue-500 to-indigo-600 text-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition">
        <div class="flex items-center space-x-4">
          <div>
            <h3 class="text-sm font-medium">Total Requests</h3>
            <p class="mt-2 text-3xl font-bold">{{ $total }}</p>
          </div>
        </div>
      </div>

      {{-- Fresh Requests --}}
      <div class="bg-gradient-to-br from-green-400 to-teal-500 text-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition">
        <div class="flex items-center space-x-4">
          <div>
            <h3 class="text-sm font-medium">Fresh Requests</h3>
            <p class="mt-2 text-3xl font-bold">{{ $fresh }}</p>
          </div>
        </div>
      </div>

      {{-- Assigned Requests --}}
      <div class="bg-gradient-to-br from-yellow-400 to-yellow-600 text-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition">
        <div class="flex items-center space-x-4">
          <div>
            <h3 class="text-sm font-medium">Assigned Requests</h3>
            <p class="mt-2 text-3xl font-bold">{{ $assigned }}</p>
          </div>
        </div>
      </div>

      {{-- Completed Requests --}}
      <div class="bg-gradient-to-br from-gray-700 to-gray-900 text-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition">
        <div class="flex items-center space-x-4">
          <div>
            <h3 class="text-sm font-medium">Completed Requests</h3>
            <p class="mt-2 text-3xl font-bold">{{ $completed }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
