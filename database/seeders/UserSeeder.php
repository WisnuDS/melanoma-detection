<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        User::create([
            "name" => "Admin",
            "email" => "admin@meldec.id",
            "password" => Hash::make("12345678"),
            "gender" => "L",
            "birth_date" => new Carbon("2000-07-05")
        ]);

        User::create([
            "name" => "dr. Fate",
            "email" => "fate@meldec.id",
            "password" => Hash::make("12345678"),
            "gender" => "L",
            "birth_date" => new Carbon("2000-07-05")
        ]);

        User::create([
            "name" => "Wisnu Dewa",
            "email" => "wisnu@meldec.id",
            "password" => Hash::make("12345678"),
            "gender" => "L",
            "birth_date" => new Carbon("2000-07-05")
        ]);
    }
}
