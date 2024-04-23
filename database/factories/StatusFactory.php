<?php

namespace Database\Factories;

use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Status>
 */
class StatusFactory extends Factory
{
    protected $model = \App\Models\Status::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Ordered',
                'Processing',
                'In Route',
                'Delivered'
            ])
        ];
    }
}
