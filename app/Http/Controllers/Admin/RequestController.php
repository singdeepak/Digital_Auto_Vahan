<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fop;
use App\Models\Client;
use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Models\RequestDetail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use LynX39\LaraPdfMerger\Facades\PdfMerger;

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


    public function editRequestDetails($id){
        $req = RequestModel::findOrFail($id);
        return view('admin.request.edit', compact('req'));
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


    public function storeRequestDetails(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reg_number'               => 'required|exists:requests,reg_number',
            'old_reg_number'           => 'nullable|string',  // Removed required
            'reg_state'                => 'required|string',
            'reg_office'               => 'required|string',
            'fitness_valid_upto'       => 'nullable|date',    // Removed required (was already nullable)
            'registration_valid_upto'  => 'nullable|date',    // Removed required (was already nullable)

            // Finance
            'financer'                 => 'required|string',

            // Owner
            'owner_name'               => 'required|string',
            'swdo_of'                  => 'required|string',
            'ownership_serial'         => 'required|string',
            'mobile_number'            => 'required|string|regex:/^[0-9]{10}$/',
            'current_address'          => 'required|string',
            'permanent_address'        => 'required|string',

            // Vehicle Info
            'maker'                    => 'required|string',
            'model'                    => 'required|string',
            'vehicle_class'            => 'required|string',
            'vehicle_category'         => 'required|string',
            'emission_norms'           => 'required|string',
            'chassis_number'           => 'required|string',
            'engine_number'            => 'required|string',
            'seating_capacity'         => 'required|integer|min:0',
            'standing_capacity'        => 'required|integer|min:0',
            'sleeper_capacity'         => 'required|integer|min:0',
            'number_of_cylinders'      => 'required|integer|min:0',
            'unladen_weight'           => 'required|integer|min:0',
            'laden_weight'             => 'required|integer|min:0',
            'fuel'                     => 'required|string',
            'color'                    => 'required|string',
            'wheelbase'                => 'required|integer|min:0',
            'cubic_capacity'           => 'required|numeric|min:0',
            'manufacture_month_year'   => 'nullable|string',   // Removed required
            'body_type'                => 'required|string',

            // NOC - Removed required
            'noc_number'               => 'nullable|string',
            'noc_issue_date'           => 'nullable|date',

            // Insurance
            'insurance_type'           => 'required|string',
            'insurance_company'        => 'required|string',
            'insurance_policy_number'  => 'required|string',
            'insurance_from_date'      => 'nullable|date',     // Removed required (was already nullable)
            'insurance_to_date'        => 'nullable|date',     // Removed required (was already nullable)

            // PUCC
            'pucc_number'              => 'required|string',
            'pucc_form'                => 'nullable|string',   // Removed required
            'pucc_upto'                => 'nullable|date',     // Removed required (was already nullable)

            // Permit - Removed required
            'permit_number'            => 'nullable|string',
            'permit_type'              => 'nullable|string',
            'permit_valid_from'        => 'nullable|date',
            'permit_valid_upto'        => 'nullable|date',

            // Tax - Removed required
            'tax_type'                 => 'nullable|string',
            'tax_amount'               => 'nullable|numeric|min:0',
            'tax_from'                 => 'nullable|date',
            'tax_upto'                 => 'nullable|date',

            // PDF upload
            'document'                 => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $requestDetails = new RequestDetail();
        $requestDetails->request_id = $id;

        // Assign all fields
        $fields = $validator->validated();
        foreach ($fields as $key => $value) {
            $requestDetails->$key = $value;
        }

        // Handle document upload
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/documents'), $filename);
            $requestDetails->document = $filename;
        }

        $requestDetails->save();
        $changeStatus = RequestModel::findOrFail($id);
        $changeStatus->status = 'completed';
        $changeStatus->save();

        return redirect()->route('request.completed')->with('success', 'Request details saved successfully.');
    }



    public function downloadPDF($id)
    {
        $requestData = RequestModel::select('requests.*')
         ->with('detail')
         ->findOrFail($id);

        // Generate dynamic PDF
        $dynamicPath = storage_path("app/dynamic_request_{$id}.pdf");
        Pdf::loadView('admin.pdf.request', ['requestData' => $requestData])
        ->setPaper('a4', 'portrait')
        ->save($dynamicPath);


        // Get existing uploaded PDF
        $filename = $requestData->detail->document;
        $uploadPdfPath = public_path("uploads/documents/{$filename}");
        if (!file_exists($uploadPdfPath)) {
            abort(404, 'Uploaded PDF not found.');
        }

        // Merge PDFs using correct method names
        $pdfMerger = PdfMerger::init();
        $pdfMerger->addPDF($dynamicPath, 'all');
        $pdfMerger->addPDF($uploadPdfPath, 'all');
        $pdfMerger->merge(); 
        $pdfMerger->save("hardcopy_of_{$requestData->reg_number}.pdf", "download");
    }
}
