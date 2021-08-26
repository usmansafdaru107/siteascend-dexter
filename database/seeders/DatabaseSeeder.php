<?php

namespace Database\Seeders;

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
        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'dgr'
        ]);
        \App\Models\User::factory()->create();
    }
}
