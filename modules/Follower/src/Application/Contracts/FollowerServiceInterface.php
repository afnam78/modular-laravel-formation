<?php

namespace Modules\Follower\src\Application\Contracts;

use App\Models\User;

interface FollowerServiceInterface
{
    /**
     * Toggle follower
     * @param User $userToFollow
     * @return void
     */
    public function toggleFollower(User $userToFollow): void;
}
