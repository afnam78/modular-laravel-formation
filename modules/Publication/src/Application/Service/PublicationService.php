<?php

namespace Modules\Publication\src\Application\Service;

use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Application\Contracts\PublicationServiceInterface;
use Modules\Publication\src\Domain\Contracts\PublicationRepositoryInterface;
use Modules\Publication\src\Domain\Entities\Publication;

class PublicationService implements PublicationServiceInterface
{
    private $repository;
    public function __construct(PublicationRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return Publication
     */
    public function createPublication(array $data): Publication
    {
        return $this->repository->createPublication($data);
    }

    /**
     * @param Publication $publication
     * @return bool
     */
    public function deletePublication(Publication $publication): bool
    {
        return $this->repository->deletePublication($publication);
    }
}
