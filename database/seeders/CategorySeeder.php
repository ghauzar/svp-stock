<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'nama_kategori' => 'Aksesoris',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Baterai',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Cartridge',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Coil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama_kategori' => 'Device',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nama_kategori' => 'Disposable',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'nama_kategori' => 'Liquid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'nama_kategori' => 'Salt Nic',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}