<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Teacher',
                'location' => 'Remote',
                'salary' => '$40,000',
            ],
            [
                'id' => 2,
                'title' => 'Software Engineer',
                'location' => 'Remote',
                'salary' => '$100,000',
            ],
            [
                'id' => 3,
                'title' => 'Data Analyst',
                'location' => 'Regina',
                'salary' => '$80,000',
            ],
        ];
    }

    public static function find(int $id): array
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);
        if (!$job) {
            abort(404);
        }
        return $job;
    }
}
