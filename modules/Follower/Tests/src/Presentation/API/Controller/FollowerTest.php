<?php

use App\Models\User;
use Modules\Follower\src\Domain\Entities\Follower;

it('can follow an user', function (): void {
    $user = User::factory()->create();
    $userToFollow = User::factory()->create();

    $response = $this->actingAs($user)->postJson(route('follower.toggle', $userToFollow->id));

    $response->assertStatus(200);

});

it('can unfollow an user', function (): void {
    $user = User::factory()->create();
    $userToFollow = User::factory()->create();
    Follower::create([
        'user_id' => $user->id,
        'follower_id' => $userToFollow->id,
    ]);

    $response = $this->actingAs($user)->postJson(route('follower.toggle', $userToFollow->id));

    $response->assertStatus(200);
});
