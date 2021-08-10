<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Employee::factory(5)->create();
        \App\Models\Customer::factory(5)->create();
        \App\Models\Supplier::factory(5)->create();
        \App\Models\AdvancedSalary::factory(5)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Product::factory(5)->create();
        \App\Models\Expense::factory(5)->create();
    }
}
