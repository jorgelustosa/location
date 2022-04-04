<?php

namespace Core\Domain\Entities;

use App\Infrastructure\Repositories\CountryRepository;
use DomainException;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Pure;

class CountryRequest
{
    private string $country;
    private string $continent;
    private string $geonameid;


    public function __construct(
        string $country,
        string $continent,
        string $geonameid,

    ) {
        $this->setCountry($country);
        $this->setContinent($continent);
        $this->setGeonameid($geonameid);

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
        $countryRepository = new CountryRepository() ;
        if (empty($country)) {
            throw new DomainException('Country of Postcode request may not be null');
        }
        if (strlen($country) > 2) {
            throw new DomainException('Size of Country parameter is bigger than allowed');
        }
        if ($countryRepository->checkCountry($country)) {
            throw new DomainException('The Country informed does not exist');
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
