<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public static function getValueByName($name){
        return Setting::select('setting_value')->where('setting_name', '=', $name)->get();
    }
}
