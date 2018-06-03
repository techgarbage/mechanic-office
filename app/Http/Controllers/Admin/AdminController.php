<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	private $path = 'admin';
	public function index(Request $request){
		return view($this->path.'/'.'index'.'/'.'dashboard');
	}
	public function ingresos(){
	    $current_year = date('Y');
	    $ingresos = array();
	    for($i=0; $i<5; $i++){
            $ingresos[$i] = (object) [
                'year' => strval($current_year),
                'value' => DB::table('invoices_data')->where(DB::raw('YEAR(created_at)'), '=', $current_year)->sum(DB::raw('quantity * unit_price'))
            ];
            $current_year-=1;
        }

	    return $ingresos;
    }
}
