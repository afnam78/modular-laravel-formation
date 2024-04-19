<?php

namespace Modules\Follower\src\Domain\Contracts;

use App\Models\User;

interface FollowerRepositoryInterface
{
    /**
     * Toggle follower
     * @param User $userToFollow
     * @return void
     */
    public function toggleFollower(User $userToFollow): void;
}
