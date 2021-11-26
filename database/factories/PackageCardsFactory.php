<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\Package;
use App\Models\BundleCard;
use Illuminate\Database\Eloquent\Factories\Factory;

class PackageCardsFactory extends Factory
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
            'package_id' => function(){
                return Package::all()->random();
            }
        ];
    }
}
