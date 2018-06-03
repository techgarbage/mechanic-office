<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function models(){
        return $this->hasMany(\App\Model::class);
    }
}
