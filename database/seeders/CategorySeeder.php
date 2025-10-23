<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Antibiotik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Antivirus', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vitamin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
