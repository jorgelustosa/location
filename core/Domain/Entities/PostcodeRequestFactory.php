<?php

namespace Core\Domain\Entities;

class PostcodeRequestFactory
{
    public static function factory(array $payload): PostcodeRequest
    {
        $payloadObj = self::transformToObject($payload);
        return new PostcodeRequest(
            $payloadObj->country,
            $payloadObj->code,
        );
    }
    private static function transformToObject(array $data)
    {
        return json_decode(json_encode($data));
    }


}
