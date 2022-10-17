<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employee_number' => $this->faker->randomNumber($nbDigits = 8, $strict = true),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'type' => $this->faker->randomElement(['dev', 'sales']),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'postal_code' => $this->faker->postCode(),
            'total_sales' => $this->faker->numberBetween($min = 0, $max = 1000),
        ];
    }
}
