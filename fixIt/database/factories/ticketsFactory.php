<?php

namespace Database\Factories;

use App\Models\tickets;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\qeue;
use App\Models\User;

class ticketsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tickets::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $title = $this->faker->sentence;

        return [
    
            'body' => $this->faker->sentence,

            'slug' => Str::slug($title),

            'qeue_id' => function(){
                return qeue::all()->random();
            },

            'assigned' => function(){
                $id = User::all()->random();
                $data = user::find($id, 'name');

                foreach ($data as $name) {
                  return $name['name'];
               }
            },

               'requested' => function(){
                    $id = User::all()->random();
                    $data = user::find($id, 'name');

                    foreach ($data as $name) {
                    return $name['name'];
                }
             
            },

            'priorty' => 3,

            'status' => 'O'

        ];
    }
}
