<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Permission;
use App\Http\Controllers\Controller;
use Validator;

class PermissionsController extends Controller
{
    private $path = 'admin';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'permissions')->withPermissions(Permission
            ::select('permissions.*')
            ->whereRaw('permissions.name LIKE (\''.$_GET['search'].'\') OR permissions.slug LIKE (\''.$_GET['search'].'\') OR permissions.id LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'permissions')->withPermissions(Permission::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'permissions');
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
            'name' => 'required|unique:permissions|max:255',
            'slug' => 'required|unique:permissions|max:255',
            'description' => 'max:1000'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('permissions.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->slug = $request->slug;
            $permission->description = $request->description;
            if ($permission->save()) return view($this->path.'/'.'index'.'/'.'permissions')->withPermissions(Permission::paginate(9))->withMessage('Permiso agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'permissions')->withPermission(Permission::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'permissions')->withData(Permission::find($id));
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
            'name' => 'required|unique:permissions,name,'.$id.'|max:255',
            'slug' => 'required|unique:permissions,slug,'.$id.'|max:255',
            'description' => 'max:1000',
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('permissions.edit', ['id' => $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $permission = Permission::find($id);
            $permission->name = $request->name;
            $permission->slug = $request->slug;
            $permission->description = $request->description;
            if ($permission->save()) return view($this->path.'/'.'show'.'/'.'permissions')->withPermission(Permission::find($id))->withMessage('Permiso actualizado correctamente');
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
        $permission = Permission::find($id);
        $permission->delete();
        return redirect(route('permissions.index'))->with('destroyed','Permiso eliminado correctamente');
    }
}
