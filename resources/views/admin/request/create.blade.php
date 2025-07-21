@extends('admin.layouts.app')

@section('content')
  <form id="requestForm" method="POST" action="{{ route('request.store') }}" class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg space-y-6">
    @csrf

    <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Create New Request</h2>

    {{-- Reg. Number --}}
    <div>
        <label for="reg_number" class="block text-sm font-semibold text-gray-700 mb-1">Reg. Number</label>
        <input type="text" name="reg_number" id="reg_number"
            value="{{ old('reg_number') }}"
            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('reg_number') border-red-500 @enderror" placeholder="Registration Number">
        @error('reg_number')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Client Name Dropdown --}}
    <div>
        <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-1">Client Name</label>
        <select name="client_name" id="client_name"
            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('client_name') border-red-500 @enderror">
            <option disabled selected>Select Client</option>
            @foreach($clients as $client)
                <option value="{{ $client->client_name }}" {{ old('client_name') == $client->client_name ? 'selected' : '' }}>
                    {{ $client->client_name }}
                </option>
            @endforeach
        </select>
        @error('client_name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- FOP Type Dropdown --}}
    <div>
        <label for="fop_type" class="block text-sm font-semibold text-gray-700 mb-1">FOP Type</label>
        <select name="fop_type" id="fop_type"
            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('fop_type') border-red-500 @enderror">
            <option disabled selected>Select FOP Type</option>
            @foreach($fops as $fop)
                <option value="{{ $fop->fop_type }}" {{ old('fop_type') == $fop->fop_type ? 'selected' : '' }}>
                    {{ $fop->fop_type }}
                </option>
            @endforeach
        </select>
        @error('fop_type')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Submit Button --}}
    <div class="text-center">
        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 shadow-md cursor-pointer">
            <i class="fas fa-paper-plane mr-2"></i>Submit Request
        </button>
    </div>
  </form>
@endsection
