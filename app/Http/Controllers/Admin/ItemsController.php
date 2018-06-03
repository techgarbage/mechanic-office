<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Item;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Validator;

class ItemsController extends Controller
{
	private $path = 'admin';

    public function datatables()
    {
        $items = Item::select(['id', 'reference', 'description', 'price']);
        return Datatables::of($items)->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'items')->withItems(Item
            ::select('items.*')
            ->whereRaw('items.description LIKE (\''.$_GET['search'].'\') OR items.reference LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'items')->withItems(Item::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'items');
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
            'reference' => 'required|unique:items|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            //return view($this->path.'/'.'create'.'/'.'clients')->withErrors($validator->errors())->withData($request);
            return redirect(route('items.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $item = new Item;
            $item->reference = $request->reference;
            $item->description = $request->description;
            $item->price= $request->price;
            if ($item->save()) return view($this->path.'/'.'index'.'/'.'items')->withItems(Item::paginate())->withMessage('Artículo agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'items')->withItem(Item::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'items')->withData(Item::find($id));
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
            'reference' => 'required|unique:items,reference,'.$id.'|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('items.edit', ['id' => $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $item = Item::find($id);
            $item->reference = $request->reference;
            $item->description = $request->description;
            $item->price= $request->price;
            if ($item->save()) return view($this->path.'/'.'show'.'/'.'items')->withItem(Item::find($id))->withMessage('Artículo actualizado correctamente');
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
        $item = Item::find($id);
        //if($client->vehicles->count()>0) return redirect(route('clients.index'))->withErrors('No se pudo eliminar el cliente seleccionado. Elimine todos sus vehículos primero.');;
        $item->delete();
        return redirect(route('items.index'))->with('destroyed','Artículo eliminado correctamente');
    }
}
