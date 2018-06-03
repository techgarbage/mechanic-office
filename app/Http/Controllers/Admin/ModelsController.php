<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model;
use Validator;

class ModelsController extends Controller
{
    private $path = 'admin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'models')->withModels(Model
            ::select('models.*')
            ->whereRaw('models.name LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'models')->withModels(Model::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'models');

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
            'name' => 'required|unique_with:models,brand_id|max:9',
            'brand_id' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('models.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $model = new Model;
            $model->name = $request->name;
            $model->brand_id = $request->brand_id;
            if ($model->save()) return view($this->path.'/'.'index'.'/'.'models')->withModels(Model::paginate(9))->withMessage('Modelo agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'models')->withModel(Model::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'models')->withData(Model::find($id));

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
            'name' => 'required|unique_with:models,brand_id,'.$id.'|max:9',
            'brand_id' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('models.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $model = Model::find($id);
            $model->name = $request->name;
            $model->brand_id = $request->brand_id;
            if ($model->save()) return view($this->path.'/'.'show'.'/'.'models')->withModel(Model::find($id))->withMessage('Modelo actualizado correctamente');
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
        $model = Model::find($id);
        if($model->vehicles->count()>0) return redirect(route('models.index'))->withErrors('No se pudo eliminar el modelo seleccionado. Elimine todos sus vehículos primero.');;
        $model->delete();
        return redirect(route('models.index'))->with('destroyed','Modelo eliminado correctamente');
    }
}
