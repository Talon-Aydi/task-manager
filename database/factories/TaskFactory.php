<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Enums\TaskStatus;

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
        $randomStatus = fake()->randomElement(TaskStatus::cases());

        return [
            'titel' => fake()->sentence(3), 
            'omschrijving' => fake()->paragraph(),
            'status' =>  $randomStatus->value,
            'deadline'     => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
            'category_id' => Category::factory(),
        ];
    }
}
