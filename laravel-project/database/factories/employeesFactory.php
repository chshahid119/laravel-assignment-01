<?php

namespace Database\Factories;

use App\Models\Employee;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employe>
 */
class employeesFactory extends Factory
{
    protected $model = Employee::class;

    public function definition(): array
    {
        $faker = FakerFactory::create('en_US'); // Adjust locale if needed
        // to generate some fake data into database
        return [
            'Ssn' => $faker->unique()->ssn(),
            'Bdate' => $faker->date(),
            'Address' => $faker->address(),
            'Salary' => $faker->numberBetween(30000, 100000),
            'Sex' => $faker->randomElement(['M', 'F']),
            'department_id' => $faker->numberBetween(1, 50),
            'supervisor_id' => null,
        ];
    }
}
