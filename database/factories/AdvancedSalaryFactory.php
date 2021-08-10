<?php

namespace Database\Factories;

use App\Models\AdvancedSalary;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvancedSalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdvancedSalary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $employee = Employee::factory();
        return [
            'employee_id'       => $employee->create()->id,
            'month'             => $this->faker->month(),
            'year'              => $this->faker->year(),
            'advanced_salary'   => $this->faker->numberBetween(10,1000)
        ];
    }
}
