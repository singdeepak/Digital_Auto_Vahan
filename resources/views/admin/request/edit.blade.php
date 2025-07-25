@extends('admin.layouts.app')

@section('content')
  <div class="max-w-4xl mx-auto bg-white p-6 rounded-2xl shadow h-[80vh] flex flex-col">
    <h2 class="text-2xl font-bold text-indigo-700 text-center mb-6 flex-none">Edit Request</h2>

    <div class="flex-1 overflow-y-auto scroll-smooth pr-9 space-y-4 custom-scrollbar">
      <form action="{{ route('admin.request.details.store', $req->id) }}" method="POST" id="editRequestForm" class="max-w-4xl mx-auto space-y-8" enctype="multipart/form-data">
        @csrf

        {{-- Registration Information --}}
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Registration Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $regFields = [
                'reg_number' => ['label' => 'Registration Number', 'type' => 'text'],
                'old_reg_number' => ['label' => 'Old Registration Number', 'type' => 'text'],
                'reg_state' => ['label' => 'Registration State', 'type' => 'text'],
                'reg_office' => ['label' => 'Registration Office', 'type' => 'text'],
                'fitness_valid_upto' => ['label' => 'Registration Fitness Valid Upto', 'type' => 'date'],
                'registration_valid_upto' => ['label' => 'Registration Valid Upto', 'type' => 'date']
              ];
            @endphp
           @foreach ($regFields as $field => $config)
            <div>
              <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                {{ $config['label'] }} <span class="text-red-500">*</span>
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
                  type="{{ $config['type'] }}"
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
        <div class=" pt-6">
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Owner Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $ownerFields = [
                'owner_name' => ['label' => 'Owner Name', 'type' => 'text'],
                'swdo_of' => ['label' => 'S/W/D Of', 'type' => 'text'],
                'ownership_serial' => ['label' => 'Ownership Serial', 'type' => 'text'],
                'mobile_number' => ['label' => 'Mobile Number', 'type' => 'tel'],
                'current_address' => ['label' => 'Current Address', 'type' => 'text'],
                'permanent_address' => ['label' => 'Permanent Address', 'type' => 'text']
              ];
            @endphp
            @foreach ($ownerFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}" 
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Vehicle Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $vehicleFields = [
                'maker' => ['label' => 'Maker', 'type' => 'text'],
                'model' => ['label' => 'Model', 'type' => 'text'],
                'vehicle_class' => ['label' => 'Vehicle Class', 'type' => 'text'],
                'vehicle_category' => ['label' => 'Vehicle Category', 'type' => 'text'],
                'emission_norms' => ['label' => 'Emission Norms', 'type' => 'text'],
                'chassis_number' => ['label' => 'Chassis Number', 'type' => 'text'],
                'engine_number' => ['label' => 'Engine Number', 'type' => 'text'],
                'seating_capacity' => ['label' => 'Seating Capacity', 'type' => 'number'],
                'standing_capacity' => ['label' => 'Standing Capacity', 'type' => 'number'],
                'sleeper_capacity' => ['label' => 'Sleeper Capacity', 'type' => 'number'],
                'number_of_cylinders' => ['label' => 'Number of Cylinders', 'type' => 'number'],
                'unladen_weight' => ['label' => 'Unladen Weight', 'type' => 'number'],
                'laden_weight' => ['label' => 'Laden Weight', 'type' => 'number'],
                'fuel' => ['label' => 'Fuel', 'type' => 'text'],
                'color' => ['label' => 'Color', 'type' => 'text'],
                'wheelbase' => ['label' => 'Wheelbase', 'type' => 'number'],
                'cubic_capacity' => ['label' => 'Cubic Capacity', 'type' => 'text'],
                'manufacture_month_year' => ['label' => 'Manufacture Month/Year', 'type' => 'month'],
                'body_type' => ['label' => 'Body Type', 'type' => 'text']
              ];
            @endphp
            @foreach ($vehicleFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}" name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500"
                      @if($config['type'] === 'number') step="1" min="0" @endif>
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- NOC Information --}}
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">NOC Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $nocFields = [
                'noc_number' => ['label' => 'NOC Number', 'type' => 'text'],
                'noc_issue_date' => ['label' => 'NOC Issue Date', 'type' => 'date']
              ];
            @endphp
            @foreach ($nocFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}" 
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Insurance Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $insFields = [
                'insurance_type' => ['label' => 'Insurance Type', 'type' => 'text'],
                'insurance_company' => ['label' => 'Insurance Company', 'type' => 'text'],
                'insurance_policy_number' => ['label' => 'Insurance Policy Number', 'type' => 'text'],
                'insurance_from_date' => ['label' => 'Insurance From Date', 'type' => 'date'],
                'insurance_to_date' => ['label' => 'Insurance To Date', 'type' => 'date']
              ];
            @endphp
            @foreach ($insFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}" 
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">PUCC Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $puccFields = [
                'pucc_number' => ['label' => 'PUCC Number', 'type' => 'text'],
                'pucc_form' => ['label' => 'PUCC from', 'type' => 'date'],
                'pucc_upto' => ['label' => 'PUCC Valid Upto', 'type' => 'date']
              ];
            @endphp
            @foreach ($puccFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}"
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Permit Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $permitFields = [
                'permit_number' => ['label' => 'Permit Number', 'type' => 'text'],
                'permit_type' => ['label' => 'Permit Type', 'type' => 'text'],
                'permit_valid_from' => ['label' => 'Permit Valid From', 'type' => 'date'],
                'permit_valid_upto' => ['label' => 'Permit Valid Upto', 'type' => 'date']
              ];
            @endphp
            @foreach ($permitFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}"
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
        <div class=" pt-6">
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Tax Information</h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @php
              $taxFields = [
                'tax_type' => ['label' => 'Tax Type', 'type' => 'text'],
                'tax_amount' => ['label' => 'Tax Amount', 'type' => 'number'],
                'tax_from' => ['label' => 'Tax From', 'type' => 'date'],
                'tax_upto' => ['label' => 'Tax Valid Upto', 'type' => 'date']
              ];
            @endphp
            @foreach ($taxFields as $field => $config)
              <div>
                <label for="{{ $field }}" class="block text-sm font-semibold text-gray-700">
                  {{ $config['label'] }} <span class="text-red-500">*</span>
                </label>
                <input type="{{ $config['type'] }}"
                      name="{{ $field }}" id="{{ $field }}"
                      value="{{ old($field, $req->$field) }}"
                      class="w-full border rounded px-3 py-2 focus:ring-indigo-500"
                      @if($config['type'] === 'number') step="1" min="0" @endif>
                @error($field)
                  <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            @endforeach
          </div>
        </div>

        {{-- PDF Upload --}}
        <div class="max-w-md mx-auto p-6">
          <label for="document"
                class="flex flex-col items-center justify-center w-full h-48 px-6 py-4 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 cursor-pointer transition">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-12 h-12 text-gray-600 mb-3"
                fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
            </svg>
            <p class="text-gray-600 font-medium">
              Drop your PDF here<br>
              <span class="text-blue-600 underline">or click to browse</span>
            </p>
            <span id="file-name" class="mt-2 text-sm text-gray-500 italic">
              No file selected
            </span>
            <input type="file" name="document" id="document"
                  accept="application/pdf" class="hidden">
          </label>
          @error('document')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>

        {{-- Submit Button --}}
        <div class="pt-6 text-center">
          <button type="submit"
                  class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-md shadow-md transition">
            <i class="fas fa-save mr-2 cursor-pointer"></i>Submit
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('script')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
  
  <script>
      // File upload handler
      const input = document.getElementById('document');
      const nameEl = document.getElementById('file-name');

      input.addEventListener('change', () => {
        if (input.files.length > 0) {
          nameEl.textContent = input.files[0].name;
        } else {
          nameEl.textContent = 'No file selected';
        }
      });
  </script>

  <script>
    $(document).ready(function () {
      console.log('jQuery version:', $.fn.jquery);
      console.log('jQuery validate available:', typeof $.fn.validate);
      console.log('Form found:', $('#editRequestForm').length);
      
      // Add custom validation methods
      $.validator.addMethod("pattern", function(value, element, regexp) {
        if (this.optional(element)) {
          return true;
        }
        
        if (typeof regexp === "string") {
          regexp = new RegExp("^(?:" + regexp + ")$");
        }
        return regexp.test(value);
      }, "Please check your input format.");

      // Add custom method for PDF extension validation
      $.validator.addMethod("extension", function(value, element, param) {
        if (this.optional(element)) {
          return true;
        }
        
        const extension = value.split('.').pop().toLowerCase();
        return param.indexOf(extension) !== -1;
      }, "Please select a file with a valid extension.");

      // Initialize form validation
      const validator = $('#editRequestForm').validate({
        ignore: [], 
        
        rules: {
          // Registration Information - Based on PDF: PB01A6691
          old_reg_number: { 
            required: true,
            minlength: 8,
            maxlength: 15,
            pattern: /^[A-Z]{2}[0-9]{2}[A-Z]{1,2}[0-9]{4}$/
          },
          reg_state: { 
            required: true,
            minlength: 3,
            maxlength: 50
          },
          reg_office: { 
            required: true,
            minlength: 5,
            maxlength: 100
          },
          fitness_valid_upto: { 
            required: true, 
            date: true 
          },
          registration_valid_upto: { 
            required: true, 
            date: true 
          },

          // Finance Information - Based on PDF: CHOLAMANDALAM INV & FIN CO LTD
          financer: { 
            required: true,
            minlength: 3,
            maxlength: 100
          },

          // Owner Information - Based on PDF data
          owner_name: { 
            required: true,
            minlength: 2,
            maxlength: 100,
            pattern: /^[A-Za-z\s\.]+$/
          },
          swdo_of: { 
            required: true,
            minlength: 2,
            maxlength: 100,
            pattern: /^[A-Za-z\s\.]+$/
          },
          ownership_serial: { 
            required: true,
            number: true,
            min: 1,
            max: 99
          },
          mobile_number: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
            pattern: /^[6-9][0-9]{9}$/
          },
          current_address: { 
            required: true,
            minlength: 10,
            maxlength: 500
          },
          permanent_address: { 
            required: true,
            minlength: 10,
            maxlength: 500
          },

          // Vehicle Information - Based on PDF: HYUNDAI XCENT
          maker: { 
            required: true,
            minlength: 2,
            maxlength: 100
          },
          model: { 
            required: true,
            minlength: 2,
            maxlength: 50
          },
          vehicle_class: { 
            required: true,
            minlength: 3,
            maxlength: 50
          },
          vehicle_category: { 
            required: true,
            minlength: 2,
            maxlength: 20
          },
          emission_norms: { 
            required: true,
            minlength: 5,
            maxlength: 50
          },
          chassis_number: { 
            required: true,
            minlength: 17,
            maxlength: 17,
            pattern: /^[A-Z0-9]{17}$/
          },
          engine_number: { 
            required: true,
            minlength: 8,
            maxlength: 20,
            pattern: /^[A-Z0-9]+$/
          },
          seating_capacity: { 
            required: true, 
            number: true, 
            min: 1,
            max: 50
          },
          standing_capacity: { 
            required: true, 
            number: true, 
            min: 0,
            max: 100
          },
          sleeper_capacity: { 
            required: true, 
            number: true, 
            min: 0,
            max: 50
          },
          number_of_cylinders: { 
            required: true, 
            number: true, 
            min: 1,
            max: 16
          },
          unladen_weight: { 
            required: true, 
            number: true, 
            min: 100,
            max: 50000
          },
          laden_weight: { 
            required: true, 
            number: true, 
            min: 200,
            max: 100000
          },
          fuel: { 
            required: true,
            minlength: 3,
            maxlength: 20
          },
          color: { 
            required: true,
            minlength: 2,
            maxlength: 30
          },
          wheelbase: { 
            required: true, 
            number: true, 
            min: 0,
            max: 10000
          },
          cubic_capacity: { 
            required: true, 
            number: true, 
            min: 50,
            max: 10000
          },
          manufacture_month_year: { 
            required: true 
          },
          body_type: { 
            required: true,
            minlength: 3,
            maxlength: 50
          },

          // NOC Information
          noc_number: { 
            required: true,
            minlength: 5,
            maxlength: 50
          },
          noc_issue_date: { 
            required: true, 
            date: true 
          },

          // Insurance Information - Based on PDF: UNITED INDIA INSURANCE
          insurance_type: { 
            required: true,
            minlength: 5,
            maxlength: 50
          },
          insurance_company: { 
            required: true,
            minlength: 5,
            maxlength: 100
          },
          insurance_policy_number: { 
            required: true,
            minlength: 10,
            maxlength: 50,
            pattern: "^[A-Z0-9/]+$"
          },
          insurance_from_date: { 
            required: true, 
            date: true 
          },
          insurance_to_date: { 
            required: true, 
            date: true 
          },

          // PUCC Information - Based on PDF: HR06200590010086
          pucc_number: { 
            required: true,
            minlength: 15,
            maxlength: 20,
            pattern: /^[A-Z]{2}[0-9]+$/
          },
          pucc_form: { 
            required: true,
            minlength: 2,
            maxlength: 20
          },
          pucc_upto: { 
            required: true, 
            date: true 
          },

          // Permit Information - Based on PDF: PB2022-AITP-5646A
          permit_number: { 
            required: true,
            minlength: 10,
            maxlength: 50,
            pattern: /^[A-Z]{2}[0-9]{4}-[A-Z]+-[0-9A-Z]+$/
          },
          permit_type: { 
            required: true,
            minlength: 5,
            maxlength: 50
          },
          permit_valid_from: { 
            required: true, 
            date: true 
          },
          permit_valid_upto: { 
            required: true, 
            date: true 
          },

          // Tax Information
          tax_type: { 
            required: true,
            minlength: 3,
            maxlength: 50
          },
          tax_amount: { 
            required: true, 
            number: true, 
            min: 1,
            max: 999999
          },
          tax_from: { 
            required: true, 
            date: true 
          },
          tax_upto: { 
            required: true, 
            date: true 
          },

          // File Upload
          document: {
            extension: "pdf"
          }
        },
        
        messages: {
          // Registration Information
          old_reg_number: {
            required: "Registration number is required",
            minlength: "Registration number must be at least 8 characters",
            maxlength: "Registration number cannot exceed 15 characters",
            pattern: "Invalid registration number format (e.g., PB01A6691)"
          },
          
          // Owner Information
          owner_name: {
            required: "Owner name is required",
            pattern: "Only alphabets, spaces and dots are allowed"
          },
          swdo_of: {
            required: "S/W/D of field is required",
            pattern: "Only alphabets, spaces and dots are allowed"
          },
          ownership_serial: {
            required: "Ownership serial is required",
            number: "Must be a valid number",
            min: "Must be at least 1",
            max: "Cannot exceed 99"
          },
          mobile_number: {
            required: "Mobile number is required",
            digits: "Only digits are allowed",
            minlength: "Mobile number must be exactly 10 digits",
            maxlength: "Mobile number must be exactly 10 digits",
            pattern: "Mobile number must start with 6, 7, 8, or 9"
          },
          
          // Vehicle Information
          chassis_number: {
            required: "Chassis number is required",
            minlength: "Chassis number must be exactly 17 characters",
            maxlength: "Chassis number must be exactly 17 characters",
            pattern: "Invalid chassis number format (only A-Z and 0-9 allowed)"
          },
          engine_number: {
            required: "Engine number is required",
            pattern: "Invalid engine number format (only A-Z and 0-9 allowed)"
          },
          seating_capacity: {
            required: "Seating capacity is required",
            min: "Must be at least 1",
            max: "Cannot exceed 50"
          },
          unladen_weight: {
            required: "Unladen weight is required",
            min: "Must be at least 100 kg",
            max: "Cannot exceed 50,000 kg"
          },
          laden_weight: {
            required: "Laden weight is required",
            min: "Must be at least 200 kg",
            max: "Cannot exceed 100,000 kg"
          },
          cubic_capacity: {
            required: "Cubic capacity is required",
            min: "Must be at least 50 cc",
            max: "Cannot exceed 10,000 cc"
          },
          
          // Insurance Information
          insurance_policy_number: {
            required: "Insurance policy number is required",
            pattern: "Invalid policy number format (only A-Z, '/', and 0-9 allowed)"
          },
          
          // PUCC Information
          pucc_number: {
            required: "PUCC number is required",
            minlength: "PUCC number must be at least 15 characters",
            pattern: "Invalid PUCC number format (e.g., HR06200590010086)"
          },
          
          // Permit Information
          permit_number: {
            required: "Permit number is required",
            pattern: "Invalid permit number format (e.g., PB2022-AITP-5646A)"
          },
          
          // Tax Information
          tax_amount: {
            required: "Tax amount is required",
            min: "Tax amount must be at least ₹1",
            max: "Tax amount cannot exceed ₹9,99,999"
          },
          
          // File Upload
          document: {
            extension: "Only PDF files are allowed"
          }
        },
        
        errorElement: "div",
        errorClass: "text-red-600 text-sm mt-1",
        
        errorPlacement: function (error, element) {
          error.addClass("text-red-600 text-sm mt-1");
          if (element.parent().hasClass("input-group")) {
            error.insertAfter(element.parent());
          } else {
            error.insertAfter(element);
          }
        },
        
        highlight: function (element) {
          $(element).addClass("border-red-500").removeClass("border-gray-300");
        },
        
        unhighlight: function (element) {
          $(element).removeClass("border-red-500").addClass("border-gray-300");
        },
        
        // This will run when form is submitted and validation fails
        invalidHandler: function(event, validator) {
          console.log('Form validation failed. Errors:', validator.numberOfInvalids());
          
          // Scroll to first error
          if (validator.errorList.length > 0) {
            const firstError = validator.errorList[0];
            $('html, body').animate({
              scrollTop: $(firstError.element).offset().top - 100
            }, 500);
          }
        },
        
        // This will run when form validation passes
        submitHandler: function(form) {
          console.log('Form validation passed, submitting...');
          form.submit();
        }
      });
      
      // Debug: Test validation on a specific field
      $('#old_reg_number').on('blur', function() {
        console.log('Old reg number validation result:', validator.element(this));
      });
    });
  </script>
 @endpush