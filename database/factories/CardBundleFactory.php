<?php

namespace Database\Factories;

use App\Models\CardBundle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardBundleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CardBundle::class;
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
            'card_count' => $this->faker->numberBetween(10,20),
            'paid_on' => now(),
        ];
    }
}
