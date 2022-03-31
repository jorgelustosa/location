<?php

namespace Core\Application;

use Core\Domain\Entities\PostcodeRequestFactory;
use Core\Domain\Entities\PostcodeRequestRepository;
use Exception;
use Psr\Log\LoggerInterface;

class CreatePostcodeRequest
{

    private PostcodeRequestRepository $postcodeRequestRepository;
    private LoggerInterface $logger;

    public function __construct(
        PostcodeRequestRepository $postcodeRequestRepository,
        LoggerInterface $logger
    ) {
        $this->postcodeRequestRepository = $postcodeRequestRepository;
        $this->logger = $logger;
    }

    /**
     * @throws Exception
     */
    public function handle(array $input): void
    {
        try {
            $postcodeRequest = PostcodeRequestFactory::factory($input);
            $this->postcodeRequestRepository->search($postcodeRequest);
        } catch (Exception $exception) {
            $this->logger->info($exception->getMessage(), ['trace' => $exception]);
            throw $exception;
        }
    }
}
