<?php

namespace Core\Domain\Entities;

use App\Infrastructure\Repositories\PostcodeCountryRepository;
use DomainException;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class PostcodeRequest
{
    private string $code;
    private string $country;

    public function __construct(
        string $country,
        string $code
    ) {
        $this->setCode($code);
        $this->setCountry($country);
    }
    private function setCode($code): void
    {
        if (empty($code)) {
            throw new DomainException('Postcode request may not be null');
        }
        $this->code = $code;
    }
    private function setCountry($country): void
    {
        $postcodeCountryRepository = new PostcodeCountryRepository() ;
        if (empty($country)) {
            throw new DomainException('Country of Postcode request may not be null');
        }
        if (strlen($country) > 2) {
            throw new DomainException('Size of Country parameter is bigger than allowed');
        }
        if ($postcodeCountryRepository->checkCountry($country)) {
            throw new DomainException('The informed Country does not exist');
        }
        $this->country = $country;
    }
    public function getCode(): string
    {
        return $this->code;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    #[Pure] #[ArrayShape(['country' => "string", 'code' => "string"])] public function toArray(): array
    {
        return [
            'country' => $this->getCountry(),
            'code' => $this->getCode(),
        ];
    }
}
