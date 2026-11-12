<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Mohamed',
            'email' => 'mohamed@example.com',
            'password' => Hash::make('password')
        ]);

        City::create([
            'name' => 'Toronto',
            'lat' => 43.706431,
            'lon' => -79.398642,
        ]);

        City::create([
            'name' => 'Oakville',
            'lat' => 43.45639,
            'lon' => -79.71389,
        ]);

        City::create([
            'name' => 'Hamilton',
            'lat' => 43.2501,
            'lon' => -79.8496,
        ]);

        City::create([
            'name' => 'Ottawa',
            'lat' => 45.411165,
            'lon' => -75.698118,
        ]);

        City::create([
            'name' => 'Thunder Bay',
            'lat' => 48.401389,
            'lon' => -89.267778,
        ]);
    }
}
