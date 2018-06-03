<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ClientResource;

use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
use App\Client;
//use Illuminate\Support\Facades\App;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return new ClientsResourceCollection(Client::all());
        return  ClientResource::collection(Client::paginate());
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
            'dni'           => 'required|unique:clients|max:9',
            'name'          => 'required|max:255',
            'last_name'     => 'required|max:255',
            'city'          => 'required|max:255',
            'address'       => 'required|max:255',
            'postal_code'   => 'required|numeric|max:60000',
            'phone'    => 'required|numeric|max:999999999'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            // store
            $client = new Client;
            $client->dni            = $request->dni;
            $client->name           = $request->name;
            $client->last_name      = $request->last_name;
            $client->city           = $request->city;
            $client->address        = $request->address;
            $client->postal_code    = $request->postal_code;
            $client->phone          = $request->phone;
            if($client->save()) return ['status' => '500', 'message'=>'success'];
            return ['status' => '200', 'message'=>'error'];
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
        return new ClientResource(Client::find($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
