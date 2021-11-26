<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Card::class;
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
            'design_template_name' => $this->faker->name,
            'template_image' => $this->faker->imageUrl($width = 100, $height = 100),
            'is_portrate' => '0',
        ];
    }
}
