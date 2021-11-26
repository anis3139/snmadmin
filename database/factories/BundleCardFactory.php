<?php

namespace Database\Factories;

use App\Models\CardBundle;
use App\Models\BundleCard;
use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

class BundleCardFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BundleCard::class;
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
            'bundle_id' => function(){
                return CardBundle::all()->random();
            },
        ];
    }
}
