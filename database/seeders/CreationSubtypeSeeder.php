<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CreationSubtype;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreationSubtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $creationSubtypes = [
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Atlas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Biografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Booklet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Buku',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Buku Mewarnai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Buku Panduan/Petunjuk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Buku Pelajaran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Buku Saku',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Bunga Rampai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Cerita Bergambar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Diktat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Dongeng',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'e-Book',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Ensiklopedia',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Jurnal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Kamus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Ilmiah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis (Artikel)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis (Disertasi)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis (Skripsi)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis (Tesis)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Karya Tulis Lainnya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Komik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Laporan Penelitian',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Majalah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Makalah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Modul',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Naskah Drama / Pertunjukan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Naskah Film',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Naskah Karya Siaran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Naskah Karya Sinematografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Novel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Perwajahan Karya Tulis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Proposal Penelitian',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Puisi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Resensi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Resume/Ringkasan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Saduran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Sinopsis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Tafsir',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9e6bc035-2c20-3df6-9729-6c1664728ab9',
                'name' => 'Terjemahan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
            // 2
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Alat Peraga',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Arsitektur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Baliho',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Banner',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Brosur',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Diorama',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Flyer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Kaligrafi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Karya Seni Batik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Karya Seni Rupa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Kolase',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Leaflet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Motif Sasirangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Motif Tapis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Motif Tenun Ikat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Motif Ulos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Pamflet',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Peta',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Poster',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Gambar',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Ilustrasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Lukis',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Motif',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Motif Lainnya',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Pahat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Patung',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Rupa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Songket',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Terapan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Seni Umum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Sketsa',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Spanduk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'be5debba-6b1a-3455-930c-f536e2d0dd18',
                'name' => 'Ukiran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 3
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Aransemen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Lagu (Musik Dengan Teks)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Blues',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Country',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Dangdut',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Elektronik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Funk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Gospel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Hip hop, Rap, Rapcore',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Jazz',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Karawitan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Klasik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Latin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Metal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Pop',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Rhythm and Blues',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Rock',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Ska, Reggae, Dub',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'c3281f10-9f65-34ac-960d-bf2404ea60a9',
                'name' => 'Musik Tanpa Teks',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 4
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Film',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Film Cerita',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Film Dokumenter',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Film Iklan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Film Kartun',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Rekaman Video',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Siaran',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Siaran Media Radio',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Siaran Media Televisi dan Film',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Siaran Video',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Karya Sinematografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Kuliah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '73d1a13f-0d74-3e60-866f-c1f98aa4bcae',
                'name' => 'Reportase',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 5
            [
                'id' => fake()->uuid(),
                'type_id' => '9f37ca79-e073-319c-9496-e7ed50d19889',
                'name' => 'Karya Fotografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '9f37ca79-e073-319c-9496-e7ed50d19889',
                'name' => 'Potret',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 6
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Drama / Pertunjukan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Drama Musikal',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Ketoprak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Komedi/Lawak',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Koreografi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Lenong',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Ludruk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Opera',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Pantomim',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Pentas Musik',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Pewayangan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Seni Akrobat',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Seni Pertunjukan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Sirkus',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Sulap',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '06f17d8d-efee-348a-b274-1ff32a512f2a',
                'name' => 'Tari (Sendra Tari)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 7
            [
                'id' => fake()->uuid(),
                'type_id' => 'a11d869b-d61c-37b0-9977-2ca7074705d2',
                'name' => 'Ceramah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'a11d869b-d61c-37b0-9977-2ca7074705d2',
                'name' => 'Karya Rekaman Suara atau Bunyi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'a11d869b-d61c-37b0-9977-2ca7074705d2',
                'name' => 'Khutbah',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => 'a11d869b-d61c-37b0-9977-2ca7074705d2',
                'name' => 'Pidato',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // 8
            [
                'id' => fake()->uuid(),
                'type_id' => '61408fd4-4497-3f4f-bbfb-fca60f6c504c',
                'name' => 'Basis Data',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '61408fd4-4497-3f4f-bbfb-fca60f6c504c',
                'name' => 'Kompilasi Ciptaan / Data',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '61408fd4-4497-3f4f-bbfb-fca60f6c504c',
                'name' => 'Permainan Video',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => fake()->uuid(),
                'type_id' => '61408fd4-4497-3f4f-bbfb-fca60f6c504c',
                'name' => 'Program Komputer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ];

        CreationSubtype::insert($creationSubtypes);
    }
}
