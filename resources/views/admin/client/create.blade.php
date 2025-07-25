@extends('admin.layouts.app')

@section('content')
    <a href="{{ route('client.index') }}"
    class="inline-flex items-center bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium px-4 py-2 rounded">
        <i class="fa-solid fa-arrow-left mr-2"></i> Back
    </a>
    
  <form id="clientForm" method="POST" action="{{ route('client.store') }}" class="max-w-xl mx-auto bg-white p-8 rounded-2xl shadow-lg space-y-6">
    @csrf

    <h2 class="text-2xl font-bold text-center text-indigo-700 mb-6">Create New Client</h2>

    {{-- Client Name --}}
    <div>
        <label for="client_name" class="block text-sm font-semibold text-gray-700 mb-1">Cleint Name</label>
        <input type="text" name="client_name" id="client_name"
            value="{{ old('client_name') }}"
            class="w-full border  px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('reg_number') border-red-500 @enderror" placeholder="Client Name">
        @error('client_name')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    {{-- Client Status --}}
    <div>
        <label for="client_status" class="block text-sm font-semibold text-gray-700 mb-1">Client Status</label>
        <select name="client_status" id="client_status"
            class="w-full border px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('client_name') border-red-500 @enderror">
            <option disabled selected>Select Status</option>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
        @error('client_status')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    

    {{-- Submit Button --}}
    <div class="text-center">
        <button type="submit"
            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 shadow-md cursor-pointer">
            <i class="fas fa-paper-plane mr-2"></i>Create Client
        </button>
    </div>
  </form>
@endsection

@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $.validator.addMethod("lettersSpacesOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
            }, "Only letters and spaces are allowed.");

            $("#clientForm").validate({
                rules: {
                    client_name: {
                        required: true,
                        lettersSpacesOnly: true
                    },
                    client_status: {
                        required: true
                    }
                },
                messages: {
                    client_name: {
                        required: "Client name is required.",
                        lettersSpacesOnly: "The client name may only contain letters and spaces."
                    },
                    client_status: {
                        required: "Please select client status."
                    }
                },
                errorClass: "text-red-500 text-sm mt-1",
                errorPlacement: function (error, element) {
                    error.insertAfter(element);
                }
            });
        });
    </script>
@endpush
