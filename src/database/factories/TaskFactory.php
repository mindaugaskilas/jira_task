<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Enums\TaskTypeEnum;
use App\Models\User;
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
        $users = User::all();
        $testers = [];
        $creators = [];
        $executors = [];

        foreach ($users as $user) {
            if ($user->role === RoleEnum::CREATOR) {
                $creators[$user->id] = $user->name;
            } elseif ($user->role === RoleEnum::TESTER) {
                $testers[$user->id] = $user->name;
            } else {
                $executors[$user->id] = $user->name;
            }
        }

        return [
            'title' => fake()->text(10),
            'description' => fake()->text(),
            'creator_id' => array_rand($creators),
            'tester_id' => array_rand($testers),
            'executor_id' => array_rand($executors),
            'status' => fake()->randomElement(StatusEnum::cases())->value,
            'type' => fake()->randomElement(TaskTypeEnum::cases())->value,
        ];
    }
}
