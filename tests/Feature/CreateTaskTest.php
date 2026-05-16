<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

uses(TestCase::class, RefreshDatabase::class);

test('task is created in database', function () {
        // Assign 
        $task = Task::factory()->raw();

        // Act
        $response = $this->post('/', $task);

        // Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'titel' => $task['titel']
        ]);
    });

test('task does not pass validation on empty form', function () {
    // Act
    $response = $this->post('/', []);

    // Assert
    $response->assertStatus(302);
    $response->assertSessionHasErrors([
        'titel', 
        'status', 
        'category_id'
    ]);
});

test('task does not pass if date is in past', function () {
    // Assign
    $invalidData = Task::factory()->raw([
        'deadline' => now()->subDay()->format('Y-m-d H:i:s')
    ]);

    // Act
    $response = $this->post('/', $invalidData);

    // Assert
    $response->assertStatus(302);
    $response->assertSessionHasErrors(['deadline']);
});