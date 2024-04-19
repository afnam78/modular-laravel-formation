<?php

use App\Models\User;
use Modules\Publication\src\Domain\Entities\Publication;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

it('can create publication', function (): void {
    $data = [
        'title' => 'Title',
        'content' => 'Content',
    ];

    $response = $this->actingAs(User::factory()->create())->postJson(route('publication.create'), $data);

    $response->assertStatus(200)
        ->assertJson(['message' => 'Publication created successfully']);

});

it('cannot create publication', function ($value, $field) {
    // Arrange
    $data = Publication::factory()->make([$field => $value]);
    $user = $data->user;
    $data = $data->toArray();

    // Act & Assert
    $response = $this->actingAs($user)->postJson(route('publication.create'), $data);
    $response->assertStatus(ResponseAlias::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJson(['message' => 'The '.$field.' field is required.', 'errors' => [$field => ['The '.$field.' field is required.']]]);

})->with([
    'with empty title' => [
        'value' => '',
        'field' => 'title',
    ],
    'with empty content' => [
        'value' => '',
        'field' => 'content',
    ],
]);
