<?php

use App\Models\User;
use Modules\Publication\src\Domain\Entities\Publication;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

it('can create comment', function (): void {

    $publication = Publication::factory()->create();

    $response = $this->actingAs(User::factory()->create())->postJson(route('comment.create', ['publication' => $publication->id]), [
        'content' => 'This is a comment',
    ]);

    $response->assertOk()
        ->assertJson(['message' => 'Comment created successfully']);

});

it('cannot create comment if user are not logged', function () {
    $publication = Publication::factory()->create();

    $response = $this->postJson(route('comment.create', ['publication' => $publication->id]), [
        'content' => 'This is a comment',
    ]);

    $response->assertStatus(ResponseAlias::HTTP_UNAUTHORIZED)
        ->assertJson(['message' => 'Unauthenticated.']);
});

it('cannot create comment if content is empty', function () {
    $publication = Publication::factory()->create();

    $response = $this->actingAs(User::factory()->create())->postJson(route('comment.create', ['publication' => $publication->id]));

    $response->assertStatus(ResponseAlias::HTTP_UNPROCESSABLE_ENTITY)
        ->assertJsonValidationErrors(['content']);
});
