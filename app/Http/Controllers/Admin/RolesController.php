<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use App\Role;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class RolesController extends Controller
{
    private $path = 'admin';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search']) && strlen($_GET['search'])>0) return view($this->path.'/'.'index'.'/'.'roles')->withRoles(Role
            ::select('roles.*')
            ->whereRaw('roles.name LIKE (\''.$_GET['search'].'\') OR roles.slug LIKE (\''.$_GET['search'].'\') OR roles.description LIKE (\''.$_GET['search'].'\')')
            ->paginate(9));
        return view($this->path.'/'.'index'.'/'.'roles')->withRoles(Role::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'roles')->withPermissions(Permission::all());
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
            'name' => 'required|unique:roles|max:191',
            'slug' => 'required|unique:roles|max:191',
            'description' => 'max:1000'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('roles.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $role = new Role;
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->description = $request->description;
            $status = $role->save();
            $role = Role::find($role['id']);
            foreach($request->permissions as $id => $name){
                $role->assignPermission($id);
            }
            if ($role->save()) return view($this->path.'/'.'index'.'/'.'roles')->withRoles(Role::paginate(9))->withMessage('Role agregado correctamente');
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
        return view($this->path.'/'.'show'.'/'.'roles')->withRole(Role::find($id));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'roles')->withData(Role::find($id))->withPermissions(Permission::all());
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
            'name' => 'required|unique:roles,name,'.$id.'|max:191',
            'slug' => 'required|unique:roles,slug,'.$id.'|max:191',
            'description' => 'max:1000'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('roles.edit'))->withErrors($validator)->withInput($request->input());
        } else {
            // update
            $role = Role::find($id);
            $role->name = $request->name;
            $role->slug = $request->slug;
            $role->description = $request->description;
            $status = $role->save();
            $role = Role::find($role['id']);
            $role->revokeAllPermissions();
            foreach($request->permissions as $id => $name){
                $role->assignPermission($id);
            }
            if ($role->save()) return view($this->path.'/'.'show'.'/'.'roles')->withRole(Role::find($role['id']))->withMessage('Role actualizado correctamente');
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
        $role = Role::find($id);
        $role->delete();
        return redirect(route('roles.index'))->with('destroyed','Role eliminado correctamente');
    }
}
