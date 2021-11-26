<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_by' => function(){
                return User::all()->random();
            },
            'name' => $this->faker->name,
            'number_of_cards' => $this->faker->numberBetween(10,20),
            'price' => $this->faker->numberBetween(10,20)
        ];
    }
}
