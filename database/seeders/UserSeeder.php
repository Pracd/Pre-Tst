<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'nama' => 'Andreas',
                'umur' => 24,
            ],
            [
                'nama' => 'Johan',
                'umur' => 32,
            ],
            [
                'nama' => 'Kikky',
                'umur' => 18,
            ],
        ]);
    }
}
