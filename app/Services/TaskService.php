<?php



namespace App\Services;
use App\Jobs\UpdateStatistics;

use App\Repositories\StatisticsRepository;
use App\Repositories\TaskRepository;

//  Start TaskService
class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    // public function createTask($data)
    // {

    //     return $this->taskRepository->create($data);
    // }


    public function createTask($data)
    {
        $task = $this->taskRepository->create($data);

        // Dispatch UpdateStatistics job
        UpdateStatistics::dispatch($task);

        return $task;
    }

    public function getTasks($perPage)
    {
        return $this->taskRepository->paginate($perPage);
    }


    public function getTaskById($id)
    {
        return $this->taskRepository->findById($id);
    }


    public function updateTask($id, $data)
    {
        $task = $this->taskRepository->update($id, $data);

        // Dispatch UpdateStatistics job
        UpdateStatistics::dispatch($task);

        return $task;
    }

    public function deleteTask($id)
    {
        return $this->taskRepository->delete($id);
    }
}


// End TaskService

