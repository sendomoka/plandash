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
                'title' => 'Belajar Laravel',
                'description' => 'Belajar framework Laravel 9 dari dasar',
                'status' => 'incomplete'
            ],
            [
                'title' => 'Belajar VueJS',
                'description' => 'Belajar framework javascript VueJS',
                'status' => 'incomplete'
            ],
            [
                'title' => 'Kerjakan Tugas',
                'description' => 'Mengerjakan tugas akhir semester',
                'status' => 'completed'
            ]
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
