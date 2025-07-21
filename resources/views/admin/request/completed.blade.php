@extends('admin.layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Completed Requests</h1>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table-auto w-full border-collapse">
  <thead>
    <tr class="bg-gray-100">
      <th class="px-4 py-2 border">#</th>
      <th class="px-4 py-2 border">Reg. Number</th>
      <th class="px-4 py-2 border">Client Name</th>
      <th class="px-4 py-2 border">FOP Type</th>
      <th class="px-4 py-2 border">Requested At</th>
      <th class="px-4 py-2 border">Status</th>
      <th class="px-4 py-2 border">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($completedRequests as $i => $req)
      <tr class="{{ $i % 2 ? 'bg-white' : 'bg-gray-50' }}">
        <td class="px-4 py-2 border">{{ $i + 1 }}</td>
        <td class="px-4 py-2 border">{{ $req->reg_number }}</td>
        <td class="px-4 py-2 border">{{ $req->client_name }}</td>
        <td class="px-4 py-2 border">{{ $req->fop_type }}</td>
        <td class="px-4 py-2 border">{{ $req->request_date->format('d M Y, h:i A') }}</td>
        <td class="px-4 py-2 border text-green-600 font-semibold">{{ ucfirst($req->status) }}</td>
        <td class="px-4 py-2 border">
            <form action="{{ route('request.download', ['id' => $req->id]) }}" method="GET">
                <button type="submit"
                class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">
                <i class="fa-solid fa-download"></i> PDF Download
                </button>
            </form>
        </td>
      </tr>
    @endforeach

    @if($completedRequests->isEmpty())
      <tr>
        <td colspan="6" class="text-center py-4 text-dark-500">No completed requests found.</td>
      </tr>
    @endif
  </tbody>
</table>
@endsection
