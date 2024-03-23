<?php

namespace Database\Factories;

use App\Models\replys;
use App\Models\User;
use App\Models\tickets;
use Illuminate\Database\Eloquent\Factories\Factory;

class replysFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = replys::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'replyName' => function(){
                    $id = User::all()->random();
                    $data = user::find($id, 'name');

                    foreach ($data as $name) {
                     return $name['name'];
                 }
         
            },


            'body' => $this->faker->sentence,

            'tickets_id' =>function(){
                return tickets::all()->random();
            },

        ];
    }
}
