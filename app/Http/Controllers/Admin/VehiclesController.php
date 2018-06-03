<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Vehicle;
use Validator;

class VehiclesController extends Controller
{
	private $path = 'admin';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'vehicles')->withVehicles(Vehicle
            ::select('vehicles.*')
            ->join('clients', 'vehicles.client_id', '=', 'clients.id')
            ->join('models', 'vehicles.model_id', '=', 'models.id')
            ->join('brands', 'models.brand_id', '=', 'brands.id')
            ->whereRaw('MATCH (clients.dni, clients.name, clients.last_name, clients.phone) AGAINST (\''.$_GET['search'].'\') OR vehicles.vehicle_registration LIKE (\''.$_GET['search'].'\') OR models.name LIKE (\''.$_GET['search'].'\') OR brands.name LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'vehicles')->withVehicles(Vehicle::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'vehicles');
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
            'vehicle_registration' => 'required|unique:vehicles|max:15',
            'model' => 'required|numeric',
            'owner' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return view($this->path.'/'.'create'.'/'.'clients')->withErrors($validator->errors())->withData($request);
            return redirect(route('vehicles.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $vehicle = new Vehicle;
            $vehicle->vehicle_registration = $request->vehicle_registration;
            $vehicle->model_id = $request->model;
            $vehicle->client_id = $request->owner;
            if ($vehicle->save()) return view($this->path.'/'.'index'.'/'.'vehicles')->withVehicles(Vehicle::paginate(9))->withMessage('Vehículo agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'vehicles')->withVehicle(Vehicle::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'vehicles')->withData(Vehicle::find($id));
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
            'vehicle_registration' => 'required|unique:vehicles,vehicle_registration,'.$id.'|max:15',
            'model' => 'required|numeric',
            'owner' => 'required|numeric',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return view($this->path.'/'.'create'.'/'.'clients')->withErrors($validator->errors())->withData($request);
            return redirect(route('vehicles.edit', ['id' => $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $vehicle = Vehicle::find($id);
            $vehicle->vehicle_registration = $request->vehicle_registration;
            $vehicle->model_id = $request->model;
            $vehicle->client_id = $request->owner;
            if ($vehicle->save()) {
                return view($this->path.'/'.'show'.'/'.'vehicles')->withVehicle(Vehicle::find($id))->withMessage('Vehículo actualizado correctamente');
            }

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
        $vehicle = Vehicle::find($id);
        //if($vehicle->vehicle_reg>0) return redirect(route('vehicles.index'))->withErrors('No se pudo eliminar el vehiculo seleccionado. Para eliminarlo debe eliminar su modelo primero');;
        $vehicle->delete();
        return redirect(route('vehicles.index'))->with('destroyed','Vehiculo eliminado correctamente');
    }
}
