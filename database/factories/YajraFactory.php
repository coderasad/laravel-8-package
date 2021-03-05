<?php

namespace Database\Factories;

use App\Models\Yajra;
use Illuminate\Database\Eloquent\Factories\Factory;

class YajraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Yajra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'bio' => $this->faker->text,
        ];
    }
}
