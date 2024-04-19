<?php

namespace Modules\Publication\src\Presentation\API\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Application\Contracts\PublicationServiceInterface;
use Modules\Publication\src\Domain\Entities\Publication;
use Modules\Publication\src\Presentation\API\Request\DeletePublicationRequest;

class DeletePublicationController extends Controller
{
    public function __invoke(DeletePublicationRequest $request, PublicationServiceInterface $service, Publication $publication): JsonResponse
    {
        try {
            $service->deletePublication($publication);
        } catch (PublicationException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['message' => 'Publication deleted successfully']);

    }
}
