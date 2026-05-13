<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Task;
use App\Models\Category;

uses(TestCase::class, RefreshDatabase::class);

beforeEach(function () {
    // Assign
    Category::create([
        'id'    => 1,
        'name'  => 'Uncategorized'
    ]);

    $this->taskMock = [
        'titel'         => 'Test task',
        'omschrijving'  => 'Test description', 
        'status'        => 'To do',
        'deadline'      => now()->addDays(7)->toDateTimeString(),
        'category_id'   => 1
    ];
});

test('task is created in database', function () use ($taskMock) {
        // Act
        $response = $this->post('/', $this->taskMock);

        // Assert
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'titel' => $this->taskMock['titel']
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
    // Act
    $data = $this->taskMock;
    $data['deadline'] = now()->subDay()->toDateTimeString();

    $response = $this->post('/', $data);

    // Assert
    $response->assertStatus(302);
    $response->assertSessionHasErrors(['deadline']);
});