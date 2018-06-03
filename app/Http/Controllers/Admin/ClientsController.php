<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Client;
use Validator;


class ClientsController extends Controller
{
    private $path = 'admin';
    private $table_name= 'clients';

    public function datatables()
    {
        if(isset($_GET['clients_with_vehicles'])){
            //$clients = Client::select(['id', 'dni', 'name', 'last_name', 'city', 'address', 'postal_code', 'phone']);
            $clients = DB::table('clients')->rightJoin('vehicles', 'clients.id', '=', 'vehicles.client_id')->select('clients.*')->distinct()->get();
            return Datatables::of($clients)->make(true);
        }
        $clients = Client::select(['id', 'dni', 'name', 'last_name', 'city', 'address', 'postal_code', 'phone']);
        return Datatables::of($clients)->make(true);
    }

    public function index(){
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'clients')->withClients(Client::whereRaw('MATCH (dni, name, last_name, phone) AGAINST (\''.$_GET['search'].'\')')->paginate(9));
        return view($this->path.'/'.'index'.'/'.'clients')->withClients(Client::paginate(9));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'clients');
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
            'dni' => 'required|unique:clients|max:9',
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'postal_code' => 'required|numeric|max:60000|min:1000',
            'phone' => 'required|numeric|max:999999999'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return view($this->path.'/'.'create'.'/'.'clients')->withErrors($validator->errors())->withData($request);
            return redirect(route('clients.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $client = new Client;
            $client->dni = $request->dni;
            $client->name = $request->name;
            $client->last_name = $request->last_name;
            $client->city = $request->city;
            $client->address = $request->address;
            $client->postal_code = $request->postal_code;
            $client->phone = $request->phone;
            $user = new User;
            $user->name = $request->name.' '.$request->last_name;
            $user->email = $request->dni;
            $user->password = bcrypt($request->phone);
            $user->save();
            $role = Role::where('slug', 'client')->first();
            $user->assignRole($role->id);

            if ($client->save()) return view($this->path.'/'.'index'.'/'.'clients')->withClients(Client::paginate(9))->withMessage('Cliente agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'clients')->withClient(Client::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'clients')->withData(Client::find($id));
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
            'dni' => 'required|unique:clients,dni,'.$id.'|max:9',
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'postal_code' => 'required|numeric|max:60000|min:1000',
            'phone' => 'required|numeric|max:999999999'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return view($this->path.'/'.'create'.'/'.'clients')->withErrors($validator->errors())->withData($request);
            return redirect(route('clients.edit', ['id' => $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $client = Client::find($id);
            $client->dni = $request->dni;
            $client->name = $request->name;
            $client->last_name = $request->last_name;
            $client->city = $request->city;
            $client->address = $request->address;
            $client->postal_code = $request->postal_code;
            $client->phone = $request->phone;
            if ($client->save()) return view($this->path.'/'.'show'.'/'.'clients')->withClient(Client::find($id))->withMessage('Cliente actualizado correctamente');
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
        $client = Client::find($id);
        if($client->vehicles->count()>0) return redirect(route('clients.index'))->withErrors('No se pudo eliminar el cliente seleccionado. Elimine todos sus vehículos primero.');;
        $client->delete();
        return redirect(route('clients.index'))->with('destroyed','Cliente eliminado correctamente');
    }
}
