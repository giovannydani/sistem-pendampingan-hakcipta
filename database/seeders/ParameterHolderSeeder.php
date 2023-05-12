<?php

namespace Database\Seeders;

use App\Models\ParameterHolder;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ParameterHolderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $province = \App\Models\Province::where('number', 33)->first();
        $district = \App\Models\District::where('number', 3311)->first();
        
        $holders = [
            [
                'id' => fake()->uuid(),
                'name' => "UNIVERSITAS MUHAMMADIYAH SURAKARTA",
                'email' => "ums@ums.ac.id", 
                'no_telp' => "0271717417",
                'nationality_id' => "8d1458c5-dde2-3ac3-901b-29d55074c4ec",
                'address' => "Jl. A. Yani, Mendungan, Pabelan",
                'country_id' => "8d1458c5-dde2-3ac3-901b-29d55074c4ec",
                'province_id' => $province->id,
                'district_id' => $district->id,
                'subdistrict_id' => "ec4e5f5e-c9a0-3567-b201-8fab56775cae",
                'postal_code' => "57169",
                'is_company' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        ParameterHolder::insert($holders);
    }
}
