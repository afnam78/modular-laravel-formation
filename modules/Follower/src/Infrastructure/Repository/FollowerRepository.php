<?php

namespace Modules\Follower\src\Infrastructure\Repository;

use App\Models\User;
use Modules\Follower\src\Domain\Contracts\FollowerRepositoryInterface;
use Modules\Follower\src\Domain\Entities\Follower;

class FollowerRepository implements FollowerRepositoryInterface
{
    /**
     * Toggle follower
     * @param User $userToFollow
     * @return void
     */
    public function toggleFollower(User $userToFollow): void
    {
        $follower = Follower::where('user_id', auth()->id())
            ->where('follower_id', $userToFollow->id)
            ->first();

        if (!$follower) {
            Follower::create([
                'user_id' => auth()->id(),
                'follower_id' => $userToFollow->id
            ]);
        } else {
            $follower->delete();
        }
    }
}
