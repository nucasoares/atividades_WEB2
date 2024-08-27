<?php

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AuthorAndBookSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategorySeeder::class,
            AuthorAndBookSeeder::class,
        ]);
    }
}

