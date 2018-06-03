<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function vehicle(){
        return $this->belongsTo(\App\Vehicle::class);
    }
    public function invoices_data(){
        return $this->hasMany(\App\Invoice_data::class);
    }
}
