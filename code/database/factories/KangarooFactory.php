<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class KangarooFactory extends Factory
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
            'nickname' => $this->faker->name(),
            'weight' => rand(1,10),
            'height' => rand(1,10),
            'gender' => 'male',
            'color' => 'brown',
            'friendliness' => 'friendly',
            'birthday' => '2020-12-12 00:00:00',
        ];
    }
}
