<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {//App\models\post::factory()->times(200)->create(['user_id' => 2]); on run cmd ontiker
        return [
          
'body' =>$this->faker->sentence(20),



        ];
    }
}
