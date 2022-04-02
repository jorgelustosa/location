<?php

namespace Core\Tests\Domain\Entities;

use Core\Domain\Entities\PostcodeRequestFactory;
use Core\Tests\DataProviders\PayloadDataProvider;
use JetBrains\PhpStorm\Pure;
use Tests\TestCase;

class PostcodeRequestTest extends TestCase
{
    public function testInitiateValidClass()
    {
        $expected = PayloadDataProvider::data();
        $postcodeRequest = PostcodeRequestFactory::factory($expected);
        $actual = $postcodeRequest->toArray();
        $this->assertSame(array_diff($expected, $actual), array_diff($actual, $expected));
        $this->assertEquals($expected['country'], $postcodeRequest->getCountry());
    }
    /**
     * @dataProvider payloadDataFieldNullProvider
     */
    public function testFieldNotNull($payload, $errorMessage)
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage($errorMessage);
        PostcodeRequestFactory::factory($payload);
    }
    #[Pure] public function payloadDataFieldNullProvider(): array
    {

        $data = [];
        $payload = PayloadDataProvider::data();
        $payload['country'] = '';
        $data[] = [$payload, 'Country of Postcode request may not be null'];

        $payload = PayloadDataProvider::data();
        $payload['code'] = '';
        $data[] = [$payload, 'Postcode request may not be null'];

        return $data;
    }
}
