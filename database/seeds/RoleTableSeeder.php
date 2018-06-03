<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Administrador', 'slug'=> 'admin',   'description'=>'Admin',  'permissions' => ['access.admin', 'access.users', 'access.settings']],
            ['name' => 'Staff',         'slug'=> 'staff',   'description'=>'Staff',  'permissions' => ['access.admin']],
            ['name' => 'Cliente',       'slug'=> 'client',  'description'=>'Cliente','permissions' => ['show.own.invoices']],
        ];
        foreach ($roles as $role){
            $role_table = new Role;
            $role_table->name = $role['name'];
            $role_table->slug = $role['slug'];
            $role_table->description = $role['description'];
            $role_table->save();
            foreach ($role['permissions'] as $permission){
                $id = \Illuminate\Support\Facades\DB::table('permissions')->where('slug', '=', $permission)->first();
                $role_table->assignPermission($id->id);
            }
        }
    }
}
