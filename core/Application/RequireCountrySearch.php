<?php

namespace Core\Application;

use App\Infrastructure\Repositories\CountryRepository;
use Core\Domain\Entities\PostcodeRequest ;
use App\Infrastructure\Repositories\PostcodeRequestRepositoryDB ;
use Exception;
use JetBrains\PhpStorm\Pure;
use Psr\Log\LoggerInterface;

class RequireCountrySearch
{

    private LoggerInterface $logger;
    private CountryRepository $countryRepository;

    #[Pure] public function __construct(
        LoggerInterface $logger
    ) {
        $this->logger = $logger ;
        $this->countryRepository = new CountryRepository();
    }

    /**
     * @throws Exception
     */
    public function handle(CountryRequest $postcodeRequest): array
    {
        try {
            return $this->postcodeRequestRepositoryDB->search($postcodeRequest);
         } catch (Exception $exception) {
            $this->logger->info($exception->getMessage(), ['trace' => $exception]);
            throw $exception;
        }
    }

}
