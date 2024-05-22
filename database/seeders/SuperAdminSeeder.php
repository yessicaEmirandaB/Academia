<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario= User::create([
            'name'=>  'Nahyr miranda',
            'email'=>  'Nahyr@gmail.com',
            'password'=> bcrypt('12345678')  
        ]);

        //$rol = Role::create(['name'=>  'Administradora']);

        //$permisos = Permission::pluck() ->all();
        //$rol ->syncPermissions($permisos);
       // $usuario->assignRole([$rol->id]);

       $usuario->assignRole('Administradora');
    }
}
