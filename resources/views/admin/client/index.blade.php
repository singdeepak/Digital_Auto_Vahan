@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-bold">Clients List</h1>
  <a href="{{ route('client.create') }}" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded">
    <i class="fa-solid fa-plus mr-2"></i>
    Add New Client
  </a>
</div>

<div class="overflow-x-auto min-w-0">
  <table class="min-w-full table-auto border-separate border-spacing-0 bg-white shadow-lg">
    <thead class="bg-gray-100 sticky top-0">
      <tr>
        <th class="px-4 py-2 border border-gray-300">#</th>
        <th class="px-4 py-2 border border-gray-300">Client Name</th>
        <th class="px-4 py-2 border border-gray-300">Status</th>
        <th class="px-4 py-2 border border-gray-300">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($clients as $i => $client)
      <tr class="{{ $i % 2 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100">
        <td class="px-4 py-2 border border-gray-300 whitespace-nowrap">{{ $i + 1 }}</td>
        <td class="px-4 py-2 border border-gray-300">{{ $client->client_name }}</td>
        <td class="px-4 py-2 border border-gray-300 text-center whitespace-nowrap">
          @if($client->client_status === 'active')
            <span class="text-green-600 font-semibold">
              <i class="fa-solid fa-circle-check mr-1"></i> Active
            </span>
          @else
            <span class="text-red-500 font-semibold">
              <i class="fa-solid fa-industry mr-1"></i> Inactive
            </span>
          @endif
        </td>
        <td class="px-4 py-2 border border-gray-300 whitespace-nowrap">
          <div class="flex items-center space-x-2">
            <a href="{{ route('client.edit', $client->id) }}"
               class="bg-indigo-500 hover:bg-indigo-600 text-white text-sm px-4 py-2 rounded flex items-center whitespace-nowrap">
              <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
            </a>
            <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this client?')">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="bg-red-700 hover:bg-red-900 text-white text-sm px-4 py-2 rounded flex items-center whitespace-nowrap cursor-pointer">
                <i class="fa-solid fa-trash mr-1"></i> Delete
              </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach

      @if($clients->isEmpty())
      <tr>
        <td colspan="4" class="text-center py-4 border border-gray-300">No clients available.</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection
