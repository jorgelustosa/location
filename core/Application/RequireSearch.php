<?php

namespace Core\Application;

use Core\Domain\Entities\PostcodeRequest ;
use App\Infrastructure\Repositories\PostcodeRequestRepositoryDB ;
use Exception;
use JetBrains\PhpStorm\Pure;
use Psr\Log\LoggerInterface;

class RequireSearch
{

    private LoggerInterface $logger;
    private PostcodeRequestRepositoryDB $postcodeRequestRepositoryDB;

    #[Pure] public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger ;
        $this->postcodeRequestRepositoryDB = new PostcodeRequestRepositoryDB();
    }

    /**
     * @throws Exception
     */
    public function handle(PostcodeRequest $postcodeRequest): array
    {
        try {
            return $this->postcodeRequestRepositoryDB->search($postcodeRequest);
         } catch (Exception $exception) {
            $this->logger->info($exception->getMessage(), ['trace' => $exception]);
            throw $exception;
        }
    }

}
