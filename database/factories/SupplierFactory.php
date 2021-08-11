<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          =>$this->faker->name(),
            'email'         =>$this->faker->email(),
            'phone'         =>$this->faker->phoneNumber(),
            'address'       =>$this->faker->address(),
            'shop_name'     =>$this->faker->name(),
            'photo'         =>$this->faker->name(),
            'bank_name'     =>$this->faker->name(),
            'bank_branch'   =>$this->faker->name(),
            'account_holder'=>$this->faker->name(),
            'account_number'=>$this->faker->numberBetween(20,999),
            'city'          =>$this->faker->city(),
            'type'          =>$this->faker->randomElement(['Distributor','WholeSeller','Broker'])
        ];
    }
}
