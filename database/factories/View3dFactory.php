<?php

namespace Database\Factories;

use App\Models\View3d;
use Illuminate\Database\Eloquent\Factories\Factory;

class View3dFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = View3d::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'playerid' => $this->faker->numberBetween(0,1000),
            'agentid' => $this->faker->numberBetween(0,1000),
            'currency' => $this->faker->currencyCode,
            'bet' => $this->faker->randomFloat(10,1,10000),
            'win' => $this->faker->randomFloat(10,1,10000),
            'tournament' => $this->faker->randomFloat(10,1,10000),
            'net' => $this->faker->randomFloat(10,1,10000),
            'fin' => $this->faker->randomFloat(10,1,10000),
            'aams_ticket' => $this->faker->word,
            'aams_table' => $this->faker->word
        ];
    }
}
