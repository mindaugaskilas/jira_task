<?php

namespace Database\Factories;

use App\Enums\StatusEnum;
use App\Enums\TaskTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
        return [
            'title' => fake()->title(),
            'description' => fake()->text(),
            'creator' => fake()->name(),
            'tester' => fake()->name(),
            'executor' => fake()->name(),
            'status' => fake()->randomElement(StatusEnum::cases())->value,
            'type' => fake()->randomElement(TaskTypeEnum::cases())->value,
        ];
    }
}
