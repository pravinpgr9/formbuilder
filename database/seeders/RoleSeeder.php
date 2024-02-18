<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role; // Make sure to include this line

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        
        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
        ]); 
    }
}
