<?php

namespace Core\Domain\Entities\Location;

use JetBrains\PhpStorm\ArrayShape;

class PostcodeFactory
{
    #[ArrayShape(['country' => "string", 'code' => "string", 'placeName' => "string", 'adminName1' => "string", 'adminName2' => "string", 'adminName3' => "string", 'latitude' => "string", 'longitude' => "string", 'accuracy' => "string"])]
    public static function factory($payload): array
    {

        $postcode = new Postcode(
            $payload->country,
            $payload->code,
            $payload->place_name,
            $payload->admin_name1,
            $payload->admin_code1,
            $payload->admin_name2,
            $payload->admin_code2,
            $payload->admin_name3,
            $payload->admin_code3,
            $payload->latitude,
            $payload->longitude,
            $payload->accuracy,
        );

        return $postcode->toArray();
    }
}
