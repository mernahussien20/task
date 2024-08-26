<?php

namespace App\Jobs;

use App\Models\Task;
use App\Models\User;
use App\Models\UserStatistics;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatistics implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $task;

    /**
     * Create a new job instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Update the statistics table logic
        $userStatistics = User::firstOrCreate(['user_id' => $this->task->assigned_to_id]);
        $userStatistics->increment('tasks_count');
    }
}
