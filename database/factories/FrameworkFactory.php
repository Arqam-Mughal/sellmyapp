<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FrameworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     

    public function definition(): array
    {
        $names = ['IOS 10.0','Andriod 9.8', 'Unity x2.3','IOS 9.0','Andriod 2.8', 'Unity x7.3','Andriod 5.8', 'Unity x3.3',];

        $randomKey = array_rand($names);

        return [
            'name' => $names[$randomKey]
        ];
    }
}
