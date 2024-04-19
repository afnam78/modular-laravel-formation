<?php

use App\Models\User;
use Illuminate\Http\Response;
use Modules\Comment\src\Domain\Entities\Comment;
use Modules\Publication\src\Domain\Entities\Publication;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

it('can delete comment', function (): void {
    $comment = Comment::factory()->create();

    $response = $this->actingAs($comment->user)->deleteJson(route('comment.delete', ['comment' => $comment]));

    $response->assertOk()
        ->assertJson(['message' => 'Comment deleted successfully']);

});
