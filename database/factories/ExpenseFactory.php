<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'     => $this->faker->name(),
            'details'   => $this->faker->text(),
            'amount'    => $this->faker->numberBetween(300,900),
            'month'     => $this->faker->monthName(),
            'date'      => $this->faker->year(),
            'date'      => $this->faker->date('Y-M-D', 'now'),
        ];
    }
}
