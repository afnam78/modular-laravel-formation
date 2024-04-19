<?php

namespace Modules\Publication\src\Infrastructure\Repository;

use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Domain\Contracts\PublicationRepositoryInterface;
use Modules\Publication\src\Domain\Entities\Publication;

class PublicationRepository implements PublicationRepositoryInterface
{
    /**
     * Create a new publication
     *
     * @param array $data
     * @return Publication
     * @throws PublicationException
     */
    public function createPublication(array $data): Publication
    {
        try {
            return Publication::create($data);
        } catch (\Exception $e) {
            throw PublicationException::errorCreatingPublication();
        }
    }

    /**
     * Delete a publication
     *
     * @param Publication $publication
     * @return bool
     * @throws PublicationException
     */
    public function deletePublication(Publication $publication): bool
    {
        try {
            return $publication->delete();
        } catch (\Exception $e) {
            throw PublicationException::errorDeletingPublication();
        }
    }
}
