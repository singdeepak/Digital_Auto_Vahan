@extends('admin.layouts.app')

@section('content')
  <div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow">
    <h2 class="text-2xl font-bold text-indigo-700 text-center mb-6">Edit Request</h2>

    <form action="{{ route('request.update', $req->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      {{-- Reg Number --}}
      <div>
        <label for="reg_number" class="block text-sm font-semibold text-gray-700 mb-1">Reg Number</label>
        <input type="text" name="reg_number" id="reg_number"
               value="{{ old('reg_number', $req->reg_number) }}"
               class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
      </div>

      {{-- Client Name Dropdown --}}

        <div>
          <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-1">
            Client Name
          </label>
          <select
            name="client_name"
            id="client_name"
            required
            class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
          >
            <option value="" disabled {{ empty(old('client_name', $req->client_name)) ? 'selected' : '' }}>
              Select Client
            </option>

            @foreach ($clients as $client)
              <option
                value="{{ trim($client->client_name) }}"
                {{ trim(old('client_name', $req->client_name)) === trim($client->client_name) ? 'selected' : '' }}
              >
                {{ $client->client_name }}
              </option>
            @endforeach

          </select>
        </div>



      {{-- FOP Type Dropdown --}}
      <div>
        <label for="fop_type" class="block text-sm font-semibold text-gray-700 mb-1">FOP Type</label>
        <select name="fop_type" id="fop_type"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
          
          <option value="" disabled {{ empty($req->fop_type) ? 'selected' : '' }}>Select FOP Type</option>
          
          @foreach ($fops as $fop)
            <option value="{{ $fop->fop_type }}" {{ $req->fop_type == $fop->fop_type ? 'selected' : '' }}>
              {{ ucfirst($fop->fop_type) }}
            </option>
          @endforeach


        </select>
      </div>



      {{-- Status Dropdown --}}
      <div>
        <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
        <select name="status" id="status"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <option disabled selected>Select Status</option>
          <option value="fresh" {{ $req->status == 'fresh' ? 'selected' : '' }}>Fresh</option>
          <option value="assigned" {{ $req->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
          <option value="completed" {{ $req->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
      </div>

      {{-- Submit Button --}}
      <div class="text-center">
        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 shadow-md">
          <i class="fas fa-save mr-2"></i>Update Request
        </button>
      </div>
    </form>
  </div>
@endsection
