<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function show($id){
        return view('dashboard_show')->withInvoice(\App\Invoice::find($id));
    }
}
