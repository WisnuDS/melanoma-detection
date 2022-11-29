<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ghiffariaq\MiniACL\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            "name" => "admin",
            "title" => "Super Admin"
        ]);
 
         Role::create([
             "name" => "doctor",
             "title" => "Dokter"
         ]);
 
         Role::create([
             "name" => "user",
             "title" => "Pengguna"
         ]);
    }
}
