@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">All Requests</h1>

<table class="table-auto w-full border-collapse">
  <thead>
    <tr class="bg-gray-100">
      <th class="px-4 py-2 border">#</th>
      <th class="px-4 py-2 border">Reg. Number</th>
      <th class="px-4 py-2 border">Client Name</th>
      <th class="px-4 py-2 border">FOP Type</th>
      <th class="px-4 py-2 border">Requested At</th>
      <th class="px-4 py-2 border">Status</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($assignedRequests as $i => $req)
      <tr class="{{ $i % 2 ? 'bg-white' : 'bg-gray-50' }}">
        <td class="px-4 py-2 border">{{ $i + 1 }}</td>
        <td class="px-4 py-2 border">{{ $req->reg_number }}</td>
        <td class="px-4 py-2 border">{{ $req->client_name }}</td>
        <td class="px-4 py-2 border">{{ $req->fop_type }}</td>
        <td class="px-4 py-2 border">{{ $req->request_date->format('d M Y, h:i A') }}</td>
        <td class="px-4 py-2 border">{{ ucfirst($req->status) }}</td>
        <td class="px-4 py-2 border">
            <a href="{{ route('admin.request.details.edit', $req->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>
        </td>

      </tr>
    @endforeach
    @if($assignedRequests->isEmpty())
      <tr>
        <td colspan="7" class="text-center py-4">No requests available.</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection


