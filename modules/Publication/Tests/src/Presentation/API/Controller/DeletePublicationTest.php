<?php

use App\Models\User;
use Illuminate\Http\Response;
use Modules\Publication\src\Domain\Entities\Publication;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

it('can delete publication', function (): void {
    $publication = Publication::factory()->create();

    $response = $this->actingAs($publication->user)->deleteJson(route('publication.delete', ['publication' => $publication]));

    $response->assertOk()
        ->assertJson(['message' => 'Publication deleted successfully']);

});

it('cannot delete publication', function (): void {
    $publication = Publication::factory()->create();

    $response = $this->actingAs(User::factory()->create())->deleteJson(route('publication.delete', ['publication' => $publication]));

    $response->assertStatus(ResponseAlias::HTTP_FORBIDDEN)
        ->assertJson(['message' => 'This action is unauthorized.']);

});
