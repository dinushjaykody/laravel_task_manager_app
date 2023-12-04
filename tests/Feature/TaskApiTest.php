<?php
namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test
     * fetch one task by id.
     */
    public function it_can_fetch_a_task_by_id()
    {
        $task = Task::factory()->create();

        $response = $this->get("/api/tasks/{$task->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $task->id,
            ]);
    }

    /** @test */
    public function it_returns_404_if_task_not_found()
    {
        $nonExistentId = 9999;

        $response = $this->get("/api/tasks/{$nonExistentId}");

        $response->assertStatus(404)
            ->assertJson([
                'message' => 'Task not found',
            ]);
    }

    /** @test
     * fetch all tasks.
     */
    public function it_can_fetch_all_tasks()
    {
        // Create tasks for testing
        Task::factory()->count(10)->create();

        $response = $this->get('/api/tasks');

        $response->assertStatus(200)
            ->assertJsonCount(10);
    }
}
