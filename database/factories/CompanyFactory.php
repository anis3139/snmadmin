<?php

namespace Database\Factories;

use  App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;
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
            'company_name' => $this->faker->name,
            'company_logo' => $this->faker->imageUrl($width = 100, $height = 100),
            'company_moto' => $this->faker->sentence(2),
        ];
    }
}
