<?php

namespace Database\Factories;

use App\Models\UrlCheck;
use Illuminate\Database\Eloquent\Factories\Factory;

class UrlCheckFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UrlCheck::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title()
        ];
    }
}