<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CreationType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creationTypes = [
            [
                'id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Karya Seni',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Komposisi Musik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Audio Visual',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '9f37ca79-e073-319c-9496-e7ed50d19889',
                'name' => 'Karya Fotografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Karya Drama & Koreografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 'a11d869b-d61c-37b0-9977-2ca7074705d2',
                'name' => 'Karya Rekaman',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => '61408fd4-4497-3f4f-bbfb-fca60f6c504c',
                'name' => 'Karya Lainnya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        CreationType::insert($creationTypes);
    }
}
