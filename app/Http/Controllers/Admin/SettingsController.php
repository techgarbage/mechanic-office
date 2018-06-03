<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Setting;
use Validator;

class SettingsController extends Controller
{
    private $path = 'admin';
    public function index(){
        return view($this->path.'/'.'index'.'/'.'settings')->withSettings(Setting::all());

    }
    public function update(Request $request){
        $rules = array(
            'setting_name' => 'required|array',
            'setting_name.*' => 'required|string|max:255',
            'setting_value' => 'required|array',
            'setting_value.*' => 'required|string|max:255'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect(route('settings.index'))->withErrors($validator)->withInput($request->input());
        } else {
            // store
            foreach ($request->setting_name as $key => $value){
                $setting = Setting::find($key);
                $setting->setting_name = $value;
                $setting->setting_value = $request->setting_value[$key];
                $status = $setting->save();
            }

            if ($status) return view($this->path.'/'.'index'.'/'.'settings')->withSettings(Setting::all())->withMessage('Ajustes actualizados correctamente');
            return ['status' => '200', 'message' => 'error'];
        }
    }
}
