<?php



namespace App\Services;

use App\Repositories\StatisticsRepository;
use App\Repositories\TaskRepository;

//  Start StatisticService
class StatisticService
{
    protected $StatisticsRepository;

    public function __construct(StatisticsRepository $StatisticsRepository)
    {
        $this->StatisticsRepository = $StatisticsRepository;
    }

    public function updateStatistics($userId, $count)
    {
        return $this->StatisticsRepository->updateOrCreate(['user_id' => $userId], ['tasks_count' => $count]);
    }

    public function getTopUsers($limit)
    {
        return $this->StatisticsRepository->getTopUsers($limit);
    }
}



// End StatisticService

