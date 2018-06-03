<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Vehicle extends Model
{
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function model(){
        return $this->belongsTo(\App\Model::class);
    }
    public function invoices(){
        return $this->hasMany(\App\Invoice::class);
    }
}
