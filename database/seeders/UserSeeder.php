<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rols = (object)['SuperAdmin', 'Admin', 'User'];
        //crear rol admin

        foreach($rols as $rol){
            Roles::create([
                'rol_name' => $rol
            ]);
        }

        $superAdmin = Roles::rol('SuperAdmin')->first();

        //crear usuario admin
        User::updateOrCreate([
            'name' => 'SuperAdmin',
            'email' => 'ramirosaezsa@gmail.com',
            'password' => Hash::make('password'),
            'status' => '1',
            'phone' => '+56911111111',
            'rol_id' => $superAdmin->id
        ]);


    }
}
