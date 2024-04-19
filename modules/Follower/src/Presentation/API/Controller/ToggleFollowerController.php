<?php

namespace Modules\Follower\src\Presentation\API\Controller;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Modules\Follower\Exceptions\FollowerException;
use Modules\Follower\src\Application\Contracts\FollowerServiceInterface;
use Modules\Follower\src\Presentation\API\Request\ToggleFollowerRequest;
use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Application\Contracts\PublicationServiceInterface;

class ToggleFollowerController extends Controller
{
    public function __invoke(User $userToFollow, FollowerServiceInterface $service): JsonResponse
    {
        $service->toggleFollower($userToFollow);

        return response()->json(['message' => 'User followed successfully!']);

    }
}
