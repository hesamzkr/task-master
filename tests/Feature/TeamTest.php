<?php


test('', function () {
    // Act
    $response = $this->get('/admin/teams');


    // Assert
    $response->assertStatus(200);
});
