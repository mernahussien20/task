<?php



namespace App\Repositories;

use App\Models\Task;


    class TaskRepository
{
    public function create(array $data)
    {
        return Task::create($data);
    }

    public function paginate($perPage)
    {
        return Task::with(['assignedTo', 'assignedBy'])->paginate($perPage);
    }


    //
    public function findById($id)
    {
        return Task::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $task = $this->findById($id);
        $task->update($data);

        return $task;
    }

    public function delete($id)
    {
        $task = $this->findById($id);
        return $task->delete();
    }

}



