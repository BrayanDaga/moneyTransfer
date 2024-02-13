<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\BankAccount;
use App\Models\Beneficiary;

class BankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BankAccount::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'ifsc' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'numero' => $this->faker->regexify('[A-Za-z0-9]{400}'),
            'description' => $this->faker->text(),
            'beneficiary_id' => Beneficiary::factory(),
        ];
    }
}
