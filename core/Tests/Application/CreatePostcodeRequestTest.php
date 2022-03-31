<?php

namespace Core\Tests\Application;

use Core\Application\CreatePostcodeRequest;
use Core\Infrastructure\PostcodeRequestRepositoryFake;
use Core\Infrastructure\LoggerServiceFake;
use Core\Tests\DataProviders\PayloadDataProvider;
use PHPUnit\Framework\TestCase;

class CreatePostcodeRequestTest extends TestCase
{

    public function testInitiateClass()
    {
        $create = new CreatePostcodeRequestTest(
            new PostcodeRequestRepositoryFake(),
            new LoggerServiceFake()
        );
        $this->assertInstanceOf(CreatePostcodeRequest::class, $create);
    }

    public function testCreateRequest()
    {
        $create = new CreatePostcodeRequest(
            new PostcodeRequestRepositoryFake(),
            new LoggerServiceFake()
        );
        $payload = PayloadDataProvider::data();
        $create->handle($payload);
        $this->assertTrue(true);
    }
}
