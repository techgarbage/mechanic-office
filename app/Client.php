<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public $id=1;
    /*
    public function create(Request $request){

    }
    public function read(Request $request){

    }
    public function update(Request $request){

    }
    public function delete(Request $request){

    }
    */
    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
