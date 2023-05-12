<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ApplicationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ApplicationType = [
            [
                'id' => fake()->uuid(),
                'name' => 'UMK, Lembaga Pendidikan, Lembaga Litbang Pemerintah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'name' => 'Umum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        ApplicationType::insert($ApplicationType);
    }
}
