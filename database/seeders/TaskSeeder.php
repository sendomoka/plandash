<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tasks = [
            [
                'title' => 'Quiz Data Mining',
                'description' => 'Prepare for the data mining quiz',
                'status' => 'Completed'
            ],
            [
                'title' => 'Learn Laravel',
                'description' => 'Learn Laravel framework from scratch',
                'status' => 'Incomplete'
            ]
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
