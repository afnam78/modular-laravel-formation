<?php

use App\Events\NewMessage;
use App\Models\Conversation;
use App\Models\User;

it('has a message', function (): void {
    $user = User::factory()->create();
    $conversation = Conversation::create([
        'message' => 'Hello, world!',
        'status' => 'sent',
        'user_id' => $user->id,
    ]);

    $event = new NewMessage($conversation);

    expect($event->broadcastWith())->toBe([
        'id' => $conversation->id,
        'message' => $conversation->message,
        'status' => $conversation->status,
        'user' => [
            'name' => $user->name,
            'id' => $user->id,
        ],
    ]);
});

