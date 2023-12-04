<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test
     * create a task
     */
    public function it_can_create_a_task()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $taskData = [
            'title' => 'New Task',
            'description' => 'Task Description',
            'completion_status' => 0, // Assuming default completion status
        ];

        $response = $this->post(route('tasks.store'), $taskData);

        $response->assertRedirect(route('tasks.index'))
            ->assertSessionHas('success', 'Task created successfully!');

        $this->assertDatabaseHas('tasks', $taskData);
    }

    /** @test
     * list all tasks
     */
    public function it_can_list_all_tasks()
    {
        // simulate authentication user.
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create test tasks
        Task::factory()->count(5)->create();

        $response = $this->get(route('tasks.index'));

        $response->assertStatus(200)
            ->assertViewIs('tasks.index')
            ->assertViewHas('tasks', function ($tasks) {
                return $tasks->count() === 5;
            });
    }

    /** @test
     * list one tsk
     */
    public function it_can_show_one_task()
    {
        // simulate authentication user.
        $user = User::factory()->create();
        $this->actingAs($user);
        
        $task = Task::factory()->create();

        $response = $this->get(route('tasks.show', ['task' => $task]));

        $response->assertStatus(200)
            ->assertViewIs('tasks.show')
            ->assertViewHas('task', function ($viewTask) use ($task) {
                return $viewTask->id === $task->id; // Check if the task ID matches
            });
    }


}
