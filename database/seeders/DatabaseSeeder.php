<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory(10)->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->safeEmail(),
        //     'role' => fake()->randomElement(UserRole::getArrayRole()),
        // ]);

        $this->call([
            // user
            DummyUserSeeder::class,

            CreationTypeSeeder::class,
            CreationSubtypeSeeder::class,

            // geographical
            CountrySeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            SubdistrictSeeder::class,

            ApplicationTypeSeeder::class,

            // parameter
            ParameterHolderSeeder::class,
        ]);
    }
}
