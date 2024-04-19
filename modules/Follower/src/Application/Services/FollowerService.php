<?php

namespace Modules\Follower\src\Application\Services;

use App\Models\User;
use Modules\Follower\src\Application\Contracts\FollowerServiceInterface;
use Modules\Follower\src\Domain\Contracts\FollowerRepositoryInterface;

class FollowerService implements FollowerServiceInterface
{
    private $repository;

    public function __construct(FollowerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Toggle a follower
     * @param User $userToFollow
     * @return void
     */
    public function toggleFollower(User $userToFollow): void
    {
        $this->repository->toggleFollower($userToFollow);
    }
}
