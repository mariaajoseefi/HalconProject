<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'company_name' => $this->faker->company,
            'fiscal_data' => $this->faker->numerify('Fiscal-####'),
            'customer_number' => $this->faker->unique()->numerify('Customer-###'),
        ];
    }
}
