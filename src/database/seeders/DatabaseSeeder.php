<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->command->info('User table seeded!');

        $this->call(TaskTableSeeder::class);
        $this->command->info('Tasks table seeded!');

        $this->call(CommentTableSeeder::class);
        $this->command->info('Comment table seeded!');
    }
}
