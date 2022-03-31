<?php

namespace App\Infrastructure\Repositories;

use Core\Domain\Entities\PostcodeRequest;
use Core\Domain\Entities\PostcodeRequestRepository;
use Core\Domain\Entities\Location\PostcodeFactory;
use DomainException;
use Illuminate\Support\Facades\DB;

class PostcodeRequestRepositoryDB implements PostcodeRequestRepository
{

    public function search(PostcodeRequest $postcodeRequest): array
    {
        $result = DB::table('postcode')
            ->where('country', '=', $postcodeRequest->getCountry())
            ->where('code', '=', $postcodeRequest->getCode())
            ->first();
        if (empty($result)) {
            throw new DomainException('Postcode request not found');
        }

       return PostcodeFactory::factory($result);
    }
}
