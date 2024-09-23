<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::firstOrCreate(['name' => 'Romance']);
        Category::firstOrCreate(['name' => 'Fantasia']);
        Category::firstOrCreate(['name' => 'Ficção Científica']);
        Category::firstOrCreate(['name' => 'Ficção Brasileira']);
        Category::firstOrCreate(['name' => 'Clássico']);
        Category::firstOrCreate(['name' => 'Suspense']);
        // Category::create(['name' => 'Romance']);
        // Category::create(['name' => 'Fantasia']);
        // Category::create(['name' => 'Ficção Científica']);
        // Category::create(['name' => 'Ficção Brasileira']);
        // Category::create(['name' => 'Clássico']);
        // Category::create(['name' => 'Suspense']);
    }
}
