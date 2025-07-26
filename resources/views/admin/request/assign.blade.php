@extends('admin.layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">All Requests</h1>

  <div class="overflow-x-auto">
    <table class="min-w-full table-auto border-separate border-spacing-0 bg-white shadow-lg">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 border border-gray-300">#</th>
          <th class="px-4 py-2 border border-gray-300">Reg. Number</th>
          <th class="px-4 py-2 border border-gray-300">Client Name</th>
          <th class="px-4 py-2 border border-gray-300">FOP Type</th>
          <th class="px-4 py-2 border border-gray-300">Requested At</th>
          <th class="px-4 py-2 border border-gray-300">Status</th>
          <th class="px-4 py-2 border border-gray-300">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($assignedRequests as $i => $req)
          <tr class="{{ $i % 2 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100">
            <td class="px-4 py-2 border border-gray-300">{{ $i + 1 }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $req->reg_number }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $req->client_name }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $req->fop_type }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ $req->request_date->format('d M Y, h:i A') }}</td>
            <td class="px-4 py-2 border border-gray-300">{{ ucfirst($req->status) }}</td>
            <td class="px-4 py-2 border border-gray-300 whitespace-nowrap">
              <a href="{{ route('admin.request.details.edit', $req->id) }}"
                 class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded inline-block">
                <i class="fa-solid fa-pen-to-square"></i> Edit
              </a>
            </td>
          </tr>
        @endforeach

        @if($assignedRequests->isEmpty())
          <tr>
            <td colspan="7" class="text-center py-4 border border-gray-300">No requests available.</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>
@endsection
