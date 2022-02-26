<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->word();
        return [
            'title'       => $title,
            'slug'        => Str::slug($title),
            'extract'     => $this->faker->paragraph(2),
            'description' => $this->faker->paragraph(5),
            'views'       => $this->faker->randomNumber(4, false),
        ];
    }
}
