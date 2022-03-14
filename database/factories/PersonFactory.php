<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'mail' => $this->faker->unique()->safeEmail(),
            'age' => $this->faker->numberBetween(1, 100)
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (Person $person) {
            $person->name .= '[making]';
            $person->save();
        })->afterCreating(function (Person $person) {
            $person->name  .= '[creating]';
            $person->save();
        });
    }

    public function nameUpper()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => strtoupper($attributes['name']),
            ];
        });
    }

    public function nameLower()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => strtolower($attributes['name']),
            ];
        });
    }
}
