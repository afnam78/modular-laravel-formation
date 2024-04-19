<?php

namespace Modules\Publication\src\Domain\Contracts;

use Modules\Publication\Exceptions\PublicationException;
use Modules\Publication\src\Domain\Entities\Publication;

interface PublicationRepositoryInterface
{
    /**
     * Create a new publication
     *
     * @param array $data
     * @return Publication
     * @throws PublicationException
     */
    public function createPublication(array $data): Publication;

    /**
     * Delete a publication
     *
     * @param Publication $publication
     * @return bool
     * @throws PublicationException
     */
    public function deletePublication(Publication $publication): bool;
}
