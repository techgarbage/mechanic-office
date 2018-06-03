<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class BrandsController extends Controller
{
	private $path = 'admin';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'brands')->withBrands(Brand
            ::select('brands.*')
            ->whereRaw('brands.name LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'brands')->withBrands(Brand::paginate(9));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'brands');
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
            'name' => 'required|unique:brands|max:255',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('brands.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $brand = new Brand;
            $brand->name = $request->name;
            if ($brand->save()) return view($this->path.'/'.'index'.'/'.'brands')->withBrands(Brand::paginate(9))->withMessage('Marca agregada correctamente');
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
        return view($this->path.'/'.'show'.'/'.'brands')->withBrand(Brand::find($id));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'brands')->withData(Brand::find($id));
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
            'name' => 'required|unique:brands,name,'.$id.'|max:255',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('brands.edit', ['id' => $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $brand = Brand::find($id);
            $brand->name = $request->name;
            if ($brand->save()) return view($this->path.'/'.'show'.'/'.'brands')->withBrand(Brand::find($id))->withMessage('Marca actualizada correctamente');
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
        $brand = Brand::find($id);
        foreach ($brand->models as $model){
            if($model->vehicles->count()>0) return redirect(route('brands.index'))->withErrors('No se pudo eliminar la marca seleccionada. Elimine todos sus vehículos primero.');;
        }
        $brand->delete();
        return redirect(route('brands.index'))->with('destroyed','Marca eliminada correctamente');
    }
}
