<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel
{
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
