<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fop;
use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function create()
    {
        $clients = Client::get();
        $fops = Fop::get();
        return view('admin.request.create', compact('clients', 'fops'));
    }


    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'reg_number'  => 'required|string|max:50',
            'client_name' => 'required|string|max:100',
            'fop_type'    => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        RequestModel::create([
            'reg_number'  => $request->input('reg_number'),
            'client_name' => $request->input('client_name'),
            'fop_type'    => $request->input('fop_type'),
            'request_date' => now()
        ]);

        return redirect()->route('request.fresh')->with('success', 'New request created successfully!');
    }


    public function fresh()
    {
        $requests = RequestModel::where('status', 'fresh')->get();
        return view('admin.request.fresh', compact('requests'));
    }


    public function assign($id)
    {
        if (empty($id)) {
            return back()->with('error', 'Request ID is missing!');
        }
        RequestModel::where('id', $id)
            ->update(['status' => 'assigned']);

        return back()->with('success', 'Request assigned successfully!');
    }


    public function fetchAllAssignedRequest(){
        $assignedRequests = RequestModel::where('status', 'assigned')->get();
        return view('admin.request.assign', compact('assignedRequests'));
    }


    public function editRequest($id){
        $clients = Client::get();
        $fops = Fop::get();
        $req = RequestModel::findOrFail($id);
        return view('admin.request.edit', compact('req', 'clients', 'fops'));
    }

    public function updateRequest(Request $request)
    {
        $req = RequestModel::findOrFail($request->id);
        $req->reg_number = $request->reg_number;
        $req->client_name = $request->client_name;
        $req->fop_type = $request->fop_type;
        $req->status = $request->status;
        $req->save();

        return redirect()->back()->with('success', 'Request status updated successfully.');
    }



    public function completed()
    {
        $completedRequests = RequestModel::where('status', 'completed')->get();
        return view('admin.request.completed', compact('completedRequests'));
    }

    public function downloadPDF($id)
    {
        $request = RequestModel::findOrFail($id);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.pdf.request', compact('request'));
        return $pdf->download('request-details.pdf');
    }
}
