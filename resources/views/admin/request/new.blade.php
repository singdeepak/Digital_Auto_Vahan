@extends('admin.layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">New Requests</h1>
  <table class="table-auto w-full">
    <thead>
      <tr>
        <th>SN</th>
        <th>Reg. Number</th>
        <th>Client Name</th>
        <th>FOP Type</th>
        <th>Request Date / Time</th>
      </tr>
    </thead>
    <tbody>
      @foreach($requests as $i => $req)
        <tr>
          <td>{{ $i+1 }}</td>
          <td>{{ $req->reg_number }}</td>
          <td>{{ $req->client_name }}</td>
          <td>{{ $req->fop_type }}</td>
          <td>{{ $req->request_datetime }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
