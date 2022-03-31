<?php

namespace Core\Tests\DataProviders;

use JetBrains\PhpStorm\ArrayShape;

class PayloadDataProvider
{
    #[ArrayShape(['country' => "string", 'code' => "string"])]
    public static function data(): array
    {
        return [
            'country' => 'NL',
            'code' => '9403 XM'
        ];
    }
}
