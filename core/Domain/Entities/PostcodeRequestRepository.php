<?php

namespace Core\Domain\Entities;

interface PostcodeRequestRepository
{
    public function search(PostcodeRequest $postcodeRequest): array;

}
