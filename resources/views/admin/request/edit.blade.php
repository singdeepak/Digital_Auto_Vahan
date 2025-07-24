@extends('admin.layouts.app')

@section('content')
  <div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow h-[80vh] flex flex-col">
    <h2 class="text-2xl font-bold text-indigo-700 text-center mb-6 flex-none">Edit Request</h2>

    <div class="flex-1 overflow-y-auto">
      <form action="{{ route('admin.request.details.store', $req->id) }}" method="POST" class="max-w-4xl mx-auto space-y-8" enctype="multipart/form-data">
        @csrf

        {{-- Registration Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Registration Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $regFields = [
                'reg_number' => 'Registration Number',
                'old_reg_number' => 'Old Registration Number',
                'reg_state' => 'Registration State',
                'reg_office' => 'Registration Office',
                'fitness_valid_upto' => 'Registration Fitness Valid Upto',
                'registration_valid_upto' => 'Registration Valid Upto'
              ];
            @endphp
           @foreach ($regFields as $field => $label)
            <div>
              <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                {{ $label }} <span class="text-red-500">*</span>
              </label>

              @if ($field === 'reg_number')
                <input
                  type="text"
                  name="{{ $field }}"
                  id="{{ $field }}"
                  value="{{ old($field, $req->$field) }}"
                  readonly
                  class="w-full border rounded px-3 py-2 bg-gray-100 text-gray-600 cursor-not-allowed focus:ring-0 focus:border-gray-300"
                />
              @else
                <input
                  type="text"
                  name="{{ $field }}"
                  id="{{ $field }}"
                  value="{{ old($field, $req->$field) }}"
                  class="w-full border rounded px-3 py-2 focus:ring-indigo-500"
                />
              @endif

              @error($field)
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
          @endforeach

          </div>
        </div>

        {{-- Finance Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Finance Information</h3>
          <div>
            <label for="financer" class="block text-sm font-semibold text-gray-700">
              Financer <span class="text-red-500">*</span>
            </label>
            <input type="text" name="financer" id="financer"
                  value="{{ old('financer', $req->financer) }}"
                  class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
            @error('financer')
              <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
        </div>

        {{-- Owner Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Owner Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $ownerFields = [
                'owner_name' => 'Owner Name',
                'swdo_of' => 'S/W/D Of',
                'ownership_serial' => 'Ownership Serial',
                'mobile_number' => 'Mobile Number',
                'current_address' => 'Current Address',
                'permanent_address' => 'Permanent Address'
              ];
            @endphp
            @foreach ($ownerFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ in_array($field,['mobile_number']) ? 'tel' : 'text' }}" 
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- Vehicle Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Vehicle Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $vehicleFields = [
                'maker' => 'Maker','model' => 'Model','vehicle_class' => 'Vehicle Class',
                'vehicle_category' => 'Vehicle Category','emission_norms' => 'Emission Norms',
                'chassis_number' => 'Chassis Number','engine_number' => 'Engine Number',
                'seating_capacity' => 'Seating Capacity','standing_capacity' => 'Standing Capacity',
                'sleeper_capacity' => 'Sleeper Capacity','number_of_cylinders' => 'Number of Cylinders',
                'unladen_weight' => 'Unladen Weight','laden_weight' => 'Laden Weight',
                'fuel' => 'Fuel','color' => 'Color','wheelbase' => 'Wheelbase',
                'cubic_capacity' => 'Cubic Capacity','manufacture_month_year' => 'Manufacture Month/Year',
                'body_type' => 'Body Type'
              ];
            @endphp
            @foreach ($vehicleFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="text" name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- NOC Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $nocFields = ['noc_number' => 'NOC Number','noc_issue_date' => 'NOC Issue Date'];
            @endphp
            @foreach ($nocFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $field==='noc_issue_date' ? 'date' : 'text' }}" 
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- Insurance Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Insurance Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $insFields = [
                'insurance_type'=>'Insurance Type','insurance_company'=>'Insurance Company',
                'insurance_policy_number'=>'Insurance Policy Number',
                'insurance_from_date'=>'Insurance From Date','insurance_to_date'=>'Insurance To Date'
              ];
            @endphp
            @foreach ($insFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ str_contains($field,'date') ? 'date' : 'text' }}" 
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- PUCC Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">PUCC Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $puccFields = [
                'pucc_number'=>'PUCC Number','pucc_form'=>'PUCC Form',
                'pucc_upto'=>'PUCC Upto'
              ];
            @endphp
            @foreach ($puccFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $field==='pucc_upto' ? 'date' : 'text' }}"
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- Permit Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Permit Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $permitFields = [
                'permit_number'=>'Permit Number','permit_type'=>'Permit Type',
                'permit_valid_from'=>'Permit Valid From','permit_valid_upto'=>'Permit Valid Upto'
              ];
            @endphp
            @foreach ($permitFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ str_contains($field,'date') ? 'date' : 'text' }}"
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- Tax Information --}}
        <div class="border-t pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Tax Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $taxFields = [
                'tax_type'=>'Tax Type','tax_amount'=>'Tax Amount',
                'tax_from'=>'Tax From','tax_upto'=>'Tax Upto'
              ];
            @endphp
            @foreach ($taxFields as $field => $label)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $label }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ str_contains($field,'date') ? 'date' : ( $field==='tax_amount' ? 'number' : 'text' ) }}"
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500">
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- PDF Upload --}}
        <div class="pt-6 border-t text-center">
          <label for="document" class="inline-flex items-center gap-2 text-indigo-600 hover:text-indigo-800 cursor-pointer text-lg font-medium">
            <i class="fas fa-file-upload text-2xl"></i>
            <span class="hidden md:inline">Upload PDF</span>
          </label>
          <input type="file" name="document" id="document" accept="application/pdf" class="hidden">
        </div>

        {{-- Status Dropdown --}}
      {{-- <div>
        <label for="status" class="block text-sm font-semibold text-gray-700 mb-1">Status</label>
        <select name="status" id="status"
                class="w-full border border-gray-300 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <option disabled selected>Select Status</option>
          <option value="fresh" {{ $req->status == 'fresh' ? 'selected' : '' }}>Fresh</option>
          <option value="assigned" {{ $req->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
          <option value="completed" {{ $req->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
      </div> --}}

        {{-- Assign Button --}}
        <div class="pt-6 border-t text-center">
          <button type="submit"
                  class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md transition">
            <i class="fas fa-save mr-2"></i>Submit
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection



