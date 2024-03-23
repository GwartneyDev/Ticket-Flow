<?php

namespace Database\Factories;

use App\Models\qeue;
use Illuminate\Database\Eloquent\Factories\Factory;

class qeueFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = qeue::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'qeue'=>$this->faker->text,
        ];
    }
}
