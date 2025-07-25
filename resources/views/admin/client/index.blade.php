@extends('admin.layouts.app')

@section('content')
<div class="flex items-center justify-between mb-4">
    <h1 class="text-2xl font-bold">Clients List</h1>
    <a href="{{ route('client.create') }}" class="inline-flex items-center bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2 rounded">
        <i class="fa-solid fa-plus mr-2"></i>
        Add New Client
    </a>
</div>


<table class="table-auto w-full border-collapse">
  <thead>
    <tr class="bg-gray-100">
      <th class="px-4 py-2 border">#</th>
      <th class="px-4 py-2 border">Client Name</th>
      <th class="px-4 py-2 border">Status</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clients as $i => $client)
      <tr class="{{ $i % 2 ? 'bg-white' : 'bg-gray-50' }}">
        <td class="px-4 py-2 border">{{ $i + 1 }}</td>
        <td class="px-4 py-2 border">{{ $client->client_name }}</td>
        <td class="px-4 py-2 border text-center">
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

        <td class="px-4 py-2 border whitespace-nowrap">
      <div class="flex items-center space-x-2">
          <!-- Edit Button -->
          <a href="{{ route('client.edit', $client->id) }}"
            class="bg-indigo-500 hover:bg-indigo-600 text-white text-sm px-4 py-2 rounded flex items-center">
              <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
          </a>

          <!-- Delete Button -->
          <form action="{{ route('client.destroy', $client->id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this client?')">
              @csrf
              @method('DELETE')
              <button type="submit"
                      class="bg-red-700 hover:bg-red-900 text-white text-sm px-4 py-2 rounded flex items-center cursor-pointer">
                  <i class="fa-solid fa-trash mr-1"></i> Delete
              </button>
          </form>
      </div>
</td>


      </tr>
    @endforeach
    @if($clients->isEmpty())
      <tr>
        <td colspan="7" class="text-center py-4">No clients available.</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection