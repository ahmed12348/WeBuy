<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'slogan' => $this->faker->randomElement(['en', 'ar']),
            'img' => 'images/languages/H9cjdDhoSopgG3pGuRfakm0dIO7OnDj083vwwTUb.png',
            'active' => '1',
        ];
    }
}
