<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\Role::factory(1)->create();

//         \App\Models\Role::factory()->create([
//             'name' => 'user'
//         ]);
    }
}
