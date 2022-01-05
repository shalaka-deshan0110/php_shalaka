<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SaleRepresentativeFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->regexify('0[0-9]{9}'),
            'current_route' => $this->faker->words(2, true),
            'comment' => $this->faker->paragraphs(2, true),
            'joined_date' => $this->faker->date('Y_m_d'),
            'manager_id' => 1
        ];
    }
}
