<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Anup Mota', 
            'email' => 'anupsuper@gmail.com',
            'password' => Hash::make('anup1234')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Pravin Pagare', 
            'email' => 'pravinpgr9@gmail.com',
            'password' => Hash::make('pravin1234')
        ]);
        $admin->assignRole('Admin'); 
    }
}
