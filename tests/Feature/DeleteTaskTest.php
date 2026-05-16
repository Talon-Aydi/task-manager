<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Task;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    // Arrange
    $this->task = Task::factory()->create();
});

test('task deleted out of the database', function () {
    // Act
    $response = $this->delete("/{$this->task->id}/delete");

    // Assert
    $response->assertStatus(302); 

    $this->assertDatabaseMissing('tasks', [
        'id' => $this->task->id,
    ]);
});

