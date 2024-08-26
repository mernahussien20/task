<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Task;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_creation()
    {
        // Create an admin user and a regular user
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'user']);

        // Create a new task
        $response = $this->actingAs($admin)->post('/tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id
        ]);

        // Assert that the response redirects to the tasks index page
        $response->assertRedirect('/tasks');

        // Assert that the task has been created in the database
        $this->assertDatabaseHas('tasks', [
            'title' => 'Test Task',
            'description' => 'Test Description',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin->id
        ]);
    }
}


