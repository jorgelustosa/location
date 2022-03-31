<?php

namespace Core\Application\Contracts;

interface PostcodeRequestEvents
{
    public function search(string $identifier): void;

    public function searchFailed(string $identifier): void;

}
