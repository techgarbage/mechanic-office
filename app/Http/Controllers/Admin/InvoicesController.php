<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Invoice_data;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
	private $path = 'admin';
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'invoices')->withInvoices(Invoice
            ::select('invoices.*')
            ->join('vehicles', 'invoices.vehicle_id', '=', 'vehicles.id')
            ->join('clients', 'vehicles.client_id', '=', 'clients.id')
            ->whereRaw('MATCH (dni, name, last_name, phone) AGAINST (\''.$_GET['search'].'\') OR vehicles.vehicle_registration LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'invoices')->withInvoices(Invoice::paginate());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'invoices');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = array(
            'client' => 'required|numeric',
            'vehicle' => 'required|numeric',
            'invoice_data' => 'required|array|min:3',
            'vehicle_kilometers' => 'numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('invoices.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $invoice = new Invoice;
            $lastInvoiceID = $invoice->where('vehicle_id','=',$request->vehicle)->orderBy('id', 'DESC')->pluck('invoice_number')->first();
            $newInvoiceID = $lastInvoiceID + 1;
            $invoice->vehicle_id = $request->vehicle;
            $invoice->invoice_number = $newInvoiceID;
            $invoice->iva = DB::table('settings')->select('setting_value')->where('setting_name', '=', 'iva')->pluck('setting_value')->first();
            $invoice->vehicle_kilometers= isset($request->vehicle_kilometers) ? $request->vehicle_kilometers : 0;
            $status = $invoice->save();
            for ($i=0; $i<sizeof($request->invoice_data['quantity']); $i++){
                $invoice_data = new Invoice_data;
                $invoice_data->invoice_id = $invoice['id'];
                $invoice_data->quantity = $request->invoice_data['quantity'][$i];
                $invoice_data->description = $request->invoice_data['description'][$i];
                $invoice_data->unit_price = $request->invoice_data['unit_price'][$i];
                $status_data = $invoice_data->save();
            }
            if ($status && $status_data) return view($this->path.'/'.'index'.'/'.'invoices')->withInvoices(Invoice::paginate())->withMessage('Factura agregada correctamente');
            return ['status' => '200', 'message' => 'error'];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view($this->path.'/'.'show'.'/'.'invoices')->withInvoice(Invoice::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'invoices')->withData(Invoice::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $rules = array(
            'client' => 'required|numeric',
            'vehicle' => 'required|numeric',
            'invoice_data' => 'required|array|min:3',
            'vehicle_kilometers' => 'numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('invoices.update'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $invoice = Invoice::find($id);
            //$lastInvoiceID = $invoice->where('vehicle_id','=',$request->vehicle)->orderBy('id', 'DESC')->pluck('invoice_number')->first();
            //$newInvoiceID = $lastInvoiceID + 1;
            $invoice->vehicle_id = $request->vehicle;
            //$invoice->invoice_number = $newInvoiceID;
            //$invoice->iva = DB::table('settings')->select('setting_value')->where('setting_name', '=', 'iva')->pluck('setting_value')->first();
            $invoice->vehicle_kilometers = isset($request->vehicle_kilometers) ? $request->vehicle_kilometers : 0;
            $status = $invoice->save();
            Invoice_data::where('invoice_id', '=', $invoice['id'])->delete();
            for ($i=0; $i<sizeof($request->invoice_data['quantity']); $i++){
                $invoice_data = new Invoice_data;
                $invoice_data->invoice_id = $invoice['id'];
                $invoice_data->quantity = $request->invoice_data['quantity'][$i];
                $invoice_data->description = $request->invoice_data['description'][$i];
                $invoice_data->unit_price = $request->invoice_data['unit_price'][$i];
                $status_data = $invoice_data->save();
            }
            if ($status && $status_data) return view($this->path.'/'.'show'.'/'.'invoices')->withInvoice(Invoice::find($id))->withMessage('Factura actualizada correctamente');
            return ['status' => '200', 'message' => 'error'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::find($id);
        $invoice->delete();
        return redirect(route('invoices.index'))->with('destroyed','Factura eliminada correctamente');
    }
}
