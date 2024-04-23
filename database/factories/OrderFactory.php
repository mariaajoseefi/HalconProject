<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Status;  

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'customer_id' => Customer::factory(),
            'status_id' => Status::inRandomOrder()->first()->id,
            'invoice_number' => $this->faker->unique()->numerify('Invoice-########'),
            'delivery_address' => $this->faker->address,
            'notes' => $this->faker->sentence,
        ];
    }
}
