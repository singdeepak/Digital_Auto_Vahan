<?php

namespace App\Http\Controllers\Admin;

use App\Models\RequestModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $total     = RequestModel::count();
        $fresh     = RequestModel::where('status', 'fresh')->count();
        $assigned  = RequestModel::where('status', 'assigned')->count();
        $completed = RequestModel::where('status', 'completed')->count();

        return view('admin.dashboard', compact('total','fresh','assigned','completed'));
    }
}
