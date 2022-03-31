<?php

namespace Core\Tests\DataProviders;

class PostcodeDataProvider
{
    public static function data($identifier = null): array
    {
        if (empty($identifier)) {
            $identifier = self::generateRandomString();
        }
        return [
            'code' => $identifier,
            'session' => '1234567',
            'date' => '2017-03-22T13:38:59.9894222',
            'amount' => 1500,
            'freightAmount' => 15,
            'customer' => [
                'type' => 1,
                'email' => 'lucas@yopmail.com',
                'name' => 'John Doe',
                'document' => '12312312312',
                'phones' => [
                    '11 99999-1111',
                    '11 99999-1111',
                ]
            ],
            'shippingAddress' => [
                'street' => 'Street name example',
                'number' => '100',
                'additionalInformation' => 'Additional information example',
                'county' => 'County Example',
                'city' => 'City Example',
                'state' => 'SP',
                'zipcode' => '12345678',
            ],
            'payments' => [
                [
                    'type' => 1,
                    'cardOwner' => 'iajsdi',
                    'cardBin' => '123456',
                    'cardEnd' => '1234'
                ],
            ],
            'items' => [
                [
                    'name' => 'asdwa'
                ],
            ]
        ];
    }

    private static function generateRandomString($length = 10)
    {
        $base = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = str_shuffle(str_repeat($base, ceil($length/strlen($base))));
        return substr($random, 0, $length);
    }
}
