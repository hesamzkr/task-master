<?php

use App\Models\Task;


test('task for board one is being shown', function () {
    // Act
    $response = $this->get('/dashboard/board/1');

    // Assert
    $response->assertStatus(200);
});

test('task edit page is being displayed', function () {
    // Arrange
    $post = Task::factory()->create();

    // Act
    $response = $this->get("/task/{$post->slug}/edit/");

    // Assert
    $response->assertStatus(200);
});
