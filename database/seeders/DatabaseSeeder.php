<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::created(['name' => 'doctor']);
        Role::created(['name' => 'admin']);
        Role::created(['name' => 'patient']);
        // \App\Models\User::factory(10)->create();
    }
}
