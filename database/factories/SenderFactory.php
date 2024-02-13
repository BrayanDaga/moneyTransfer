<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sender;

class SenderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sender::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'surname' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'document' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'cellphoneNumber' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'typeOfDocument' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'country' => $this->faker->country(),
        ];
    }
}
