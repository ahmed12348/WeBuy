<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
//           'translation_lang' => $this->faker->name(),
            'translation_of' => '0',
            'price' => '125',
            'language_id' => '1',
            'active' => '1',
            'img' => 'images/products/ePhgrKk3anY6uK2otRtodhO5oPHIsI9OeTGyvfK6.png',
        ];
    }
}
