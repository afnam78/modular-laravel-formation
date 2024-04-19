<?php

namespace Modules\Publication\src\Presentation\API\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Application\Contracts\PublicationServiceInterface;
use Modules\Publication\src\Presentation\API\Request\CreatePublicationRequest;

class CreatePublicationController extends Controller
{
    public function __invoke(CreatePublicationRequest $request, PublicationServiceInterface $service): JsonResponse
    {
        try {
            $data = $request->safe()->only(['title', 'content', 'author']);
            $data['user_id'] = auth()->user()->id;
            $service->createPublication($data);
        } catch (PublicationException $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }

        return response()->json(['message' => 'Publication created successfully']);

    }
}
