<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $roles = Role::all();
        foreach ($roles as $role) {
            User::factory(10)->create(['role_id' => $role->id]);
        }
    }
}
