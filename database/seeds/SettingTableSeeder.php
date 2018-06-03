<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings=[
            'sitename' => 'Mechanic-Office',
            'sitedescription' => 'Simple CRM',
            'iva' => '21',
            'address' => '123 Calle Juego de Pelota',
            'city' => 'Lucena, ES',
            'logo' => '/img/logo.png',
        ];
        foreach ($settings as $setting_name => $setting_value){
            $row = new Setting();
            $row->setting_name = $setting_name;
            $row->setting_value = $setting_value;
            $row->save();
        }
    }
}
