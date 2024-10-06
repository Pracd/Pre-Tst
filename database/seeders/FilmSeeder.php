<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film')->insert([
            [
                'judul' => 'Andreas',
                'harga' => 500000,
                'penonton' => 1,
            ],
            [
                'judul' => 'Fyaz',
                'harga' => 120000,
                'penonton' => 1,
            ],
            [
                'judul' => 'Fahmi',
                'harga' => 32000,
                'penonton' => 2,
            ],
        ]);
    }
}
