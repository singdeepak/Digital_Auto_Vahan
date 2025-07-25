<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_name' => ['required', 'regex:/^[a-zA-Z\s]+$/', 'unique:clients,client_name'],
            'client_status' => 'required'
        ], [
            'client_name.regex' => 'The client name may only contain letters and spaces.',
            'client_name.unique' => 'This client name is already taken.'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $client = new Client();
            $client->client_name = $request->client_name;
            $client->client_status = $request->client_status;
            $client->save();
            return redirect()->route('client.index')->with('success', 'Client created successfully..!');
        }catch(Exception $e){
            Log::error('Error while saving client: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Something went wrong while saving the client.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('admin.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'client_name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'unique:clients,client_name,' . $id
            ],
            'client_status' => 'required'
        ], [
            'client_name.regex' => 'The client name may only contain letters and spaces.',
            'client_name.unique' => 'This client name is already taken.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $client = Client::findOrFail($id);
            $client->client_name = $request->client_name;
            $client->client_status = $request->client_status;
            $client->save();

            return redirect()->route('client.index')->with('success', 'Client updated successfully..!');
        } catch (\Exception $e) {
            Log::error('Error while updating client: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Something went wrong while updating the client.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $client = Client::findOrFail($id);
            $client->delete();

            return redirect()->route('client.index')->with('success', 'Client deleted successfully..!');
        } catch (Exception $e) {
            Log::error('Error while deleting client: ' . $e->getMessage());

            return redirect()->route('client.index')
                ->with('error', 'Something went wrong while deleting the client.');
        }
    }
}
