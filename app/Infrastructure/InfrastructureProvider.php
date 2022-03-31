<?php

namespace App\Infrastructure;

use App\Infrastructure\Repositories\PostcodeRequestRepositoryDB;
use Core\Domain\Entities\PostcodeRequestRepository;
use Illuminate\Support\ServiceProvider;

class InfrastructureProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PostcodeRequestRepository::class, PostcodeRequestRepositoryDB::class);
    }
}
