<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'Acceso al menu de admin',   'slug'=> 'access.admin',        'description'=>'Acceder a admin'],
            ['name' => 'Administrar usuarios',      'slug'=> 'access.users',        'description'=>'Admin users'],
            ['name' => 'Administrar Ajustes',       'slug'=> 'access.settings',     'description'=>'Admin settings'],
            ['name' => 'Ver facturas propias',      'slug'=> 'show.own.invoices',    'description'=>'Ver facturas'],

        ];
        foreach ($permissions as $permission){
            $permission_table = new Permission;
            $permission_table->name = $permission['name'];
            $permission_table->slug = $permission['slug'];
            $permission_table->description = $permission['description'];
            $permission_table->save();
        }
    }
}
