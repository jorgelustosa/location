<?php

namespace Core\Infrastructure;

use Core\Domain\Entities\PostcodeRequest;
use Core\Domain\Entities\PostcodeRequestRepository;

class PostcodeRequestRepositoryFake implements PostcodeRequestRepository
{

    public function search(PostcodeRequest $postcodeRequest): array
    {
        // TODO: Implement search() method.

        return array();
    }
}
