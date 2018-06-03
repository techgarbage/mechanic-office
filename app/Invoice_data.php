<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice_data extends Model
{
    protected $table = 'invoices_data';
    public function invoice(){
        return $this->belongsTo(\App\Invoice::class);
    }
}
