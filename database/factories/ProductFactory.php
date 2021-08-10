<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::factory();
        $supplier = Supplier::factory();
        return [
            'name'          => $this->faker->name(),
            'category_id'   => $category->create()->id,
            'supplier_id'   => $supplier->create()->id,
            'code'          => $this->faker->title(),
            'garage'        => $this->faker->name(),
            'route'         => $this->faker->name(),
            'photo'         => $this->faker->image('public/images/product',640,480),
            'buy_date'      => $this->faker->date(),
            'expire_date'   => $this->faker->date(),
            'buying_price'  => $this->faker->numberBetween(99,400),
            'selling_price' => $this->faker->numberBetween(200,900)
        ];
    }
}
