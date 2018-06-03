<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Validator;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UsersController extends Controller
{
	private $path = 'admin';
	private $table_name= 'users';

    public function index(){
        return view($this->path.'/'.'index'.'/'.'users')->withUsers(DB::table($this->table_name)->paginate(10));


	    //return view($this->path.'/'.'users');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datatables()
    {
	    $users = User::select(['id','name', 'email', 'created_at', 'updated_at']);
	    return Datatables::of($users)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'/'.'create'.'/'.'users')->withRoles(Role::all());
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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|max:255'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('users.create'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $status = $user->save();
            $user = User::find($user['id']);
            foreach ($request->roles as $id => $role) {
                $user->assignRole($id);
            }
            if ($user->save()) {
                return view($this->path.'/'.'index'.'/'.'users')->withUsers(User::paginate(9))->withMessage('Usuario agregado correctamente');
            }

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
        return view($this->path.'/'.'show'.'/'.'users')->withUser(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->path.'/'.'edit'.'/'.'users')->withData(User::find($id))->withRoles(Role::all());

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
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id.'|max:255',
            'password' => 'max:255'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('users.edit', ['id'=> $id]))->withErrors($validator)->withInput($request->input());
        } else {
            // update
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            if(strlen($request->password)>0) $user->password = Hash::make($request->password);
            $status = $user->save();
            $user = User::find($user['id']);
            $user->revokeAllRoles();
            foreach ($request->roles as $id => $role) {
                $user->assignRole($id);
            }
            if ($user->save()) return view($this->path.'/'.'show'.'/'.'users')->withUser(User::find($user['id']))->withMessage('Usuario actualizado correctamente');
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
        $user = User::find($id);
        $user->delete();
        return redirect(route('users.index'))->with('destroyed','Usuario eliminado correctamente');
    }
}
