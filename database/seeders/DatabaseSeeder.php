<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            StatusSeeder::class,
            CustomerSeeder::class,
            UserSeeder::class,
            OrderSeeder::class,
        ]);
    }
}