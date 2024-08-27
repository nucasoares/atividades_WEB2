<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    
    protected $model = Author::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'birth_date' => $this->faker->date()

        ];
    }
}
