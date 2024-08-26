<?php

namespace App\Repositories;

use App\Models\Statistics;
use App\Models\Task;

class StatisticsRepository
{
    public function updateOrCreate(array $conditions, array $data)
    {
        return Statistics::updateOrCreate($conditions, $data);
    }

    public function getTopUsers($limit)
    {
        return Statistics::with('user')
            ->orderBy('tasks_count', 'desc')
            ->take($limit)
            ->get();
    }
}



