<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $board_names = ['Development', 'Marketing', 'Design', 'Finance'];
        \App\Models\Board::factory(count($board_names))->create([
            'name' => function () use (&$board_names) {
                return array_shift($board_names);
            },
        ]);

        $team_names = ['Frontend', 'Backend', 'Research', 'UI/UX'];
        \App\Models\Team::factory(count($team_names))->create([
            'name' => function () use (&$team_names) {
                return array_shift($team_names);
            },
        ]);

        \App\Models\Task::factory(10)->create([
            'board_id' => function () {
                return rand(1, 4);
            },
        ]);

        User::create([
            'name' => 'Joe',
            'email' => 'joe@gmail.com',
            'password' => '$2y$12$smPxeMWUJ7bCkVl6d.iz.ukXrWXoGkdhlQ3cXq/YCoUgyfHwlF41m',
            'email_verified_at' => now(),
            'is_admin' => true,
        ]);
    }
}
