<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

class CardPackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'card_id' => function(){
                return Card::all()->random();
            },
            'package_id' => function(){
                return Package::all()->random();
            }
        ];
    }
}
