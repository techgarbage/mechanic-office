<?php

use Illuminate\Database\Seeder;
use \App\Role;
use \App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('slug', 'admin')->first();
        $role_staff = Role::where('slug', 'staff')->first();
        $role_client = Role::where('slug', 'client')->first();


        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->assignRole($role_admin->id);

        $user = new User();
        $user->name = 'Staff';
        $user->email = 'staff@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->assignRole($role_staff->id);

        $user = new User();
        $user->name = 'Cliente';
        $user->email = 'cliente@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->assignRole($role_client->id);



    }
}
