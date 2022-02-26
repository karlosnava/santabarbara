<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    public function definition()
    {
        return [
            'url' => 'posts/' . $this->faker->image('public/storage/posts/', 1280, 720, null, false)
        ];
    }
}
