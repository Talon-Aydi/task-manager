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

test('task is edited in database', function () {
        // Act
        $updatedData = Task::factory()->raw(['titel' => 'Task test']);

        $response = $this->put("/{$this->task->id}", $updatedData);

        // Assert
        $response->assertStatus(302);

        expect($this->task->refresh()->titel)->toBe("Task test");
    });

test('task edit does not pass validation on wrong input', function () {
        // Arrange
        $title = $this->task->titel; 

        // Act
        $updatedData = Task::factory()->raw([
            'titel' => 'An unnecessary title that is too long'
        ]);

        $response = $this->put("/{$this->task->id}", $updatedData);

        // Assert
        $response->assertSessionHasErrors(['titel']);
        expect($this->task->refresh()->titel)->toBe($title);
    });

test('task edit does not pass validation on empty input', function () {
        // Arrange
        $title = $this->task->titel; 

        // Act
        $updatedData = Task::factory()->raw([
            'titel' => null,
        ]);

        $response = $this->put("/{$this->task->id}", $updatedData);

        // Assert
        $response->assertSessionHasErrors(['titel']);
        expect($this->task->refresh()->titel)->toBe($title);
    });


