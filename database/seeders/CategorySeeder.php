<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create(['name' => 'Laravel', 'slug' => 'laravel']);
        category::create(['name' => 'PHP', 'slug' => 'php']);
        category::create(['name' => 'Tutorial', 'slug' => 'tutorial']);
    }
}
