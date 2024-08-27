<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;


class AuthorAndBookSeeder extends Seeder
{
    
    public function run()
    {
          Author::factory(100)->hasBooks(10)->create();

    }
}
