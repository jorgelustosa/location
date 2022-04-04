<?php

namespace Tests\Http\Controllers;

use App\Infrastructure\Repositories\PostcodeRequestRepositoryDB;
use Core\Domain\Entities\PostcodeRequestRepository;
use Core\Tests\DataProviders\PayloadDataProvider;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostcodeRequestControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testRequest()
    {
        $payload = PayloadDataProvider::data();
        $this->app->bind(PostcodeRequestRepository::class, PostcodeRequestRepositoryDB::class);
        $this->post('/location/postcode', $payload);
        $this->seeStatusCode(400);
    }
}
