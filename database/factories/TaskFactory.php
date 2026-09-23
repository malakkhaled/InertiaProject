<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        return [
            'task_name'=>$this->faker->sentence(),
             'task_info'=>$this->faker->paragraph(),
              'priority'=>$this->faker->sentence()

        ];*/
    }
}
