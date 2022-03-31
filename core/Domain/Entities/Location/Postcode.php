<?php

namespace Core\Domain\Entities\Location;

use DomainException;
use JetBrains\PhpStorm\ArrayShape;

class Postcode
{
    private string $country;
    private string $code;
    private string $placeName;
    private string $adminName1;
    private string $adminCode1;
    private string $adminName2;
    private string $adminCode2;
    private string $adminName3;
    private string $adminCode3;
    private string $latitude;
    private string $longitude;
    private string $accuracy;

    public function __construct(
         string $country,
         string $code,
         string $placeName,
         string $adminName1,
         string $adminCode1,
         string $adminName2,
         string $adminCode2,
         string $adminName3,
         string $adminCode3,
         string $latitude,
         string $longitude,
         string $accuracy
    ) {
        $this->setCountry($country)
            ->setCode($code)
            ->setPlaceName($placeName)
            ->setAdminName1($adminName1)
            ->setAdminCode1($adminCode1)
            ->setAdminName2($adminName2)
            ->setAdminCode2($adminCode2)
            ->setAdminName3($adminName3)
            ->setAdminCode3($adminCode3)
            ->setLatitude($latitude)
            ->setLongitude($longitude)
            ->setAccuracy($accuracy)
        ;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function setCountry(string $country): self
    {
        if (empty($country)) {
            throw new DomainException('Country number cannot be null');
        }
        $this->country = $country;
        return $this;
    }
    public function getCode(): string
    {
        return $this->code;
    }
    public function setCode(string $code): self
    {
        if (empty($code)) {
            throw new DomainException('Code number cannot be null');
        }
        $this->code = $code;
        return $this;
    }
    public function getPlaceName(): string
    {
        return $this->placeName;
    }
    public function setPlaceName(string $placeName): self
    {
        if (empty($placeName)) {
            throw new DomainException('Place Name number cannot be null');
        }
        $this->placeName = $placeName;
        return $this;
    }
    public function getAdminName1(): string
    {
        return $this->adminName1;
    }
    public function setAdminName1(string $adminName1): self
    {
        if (empty($adminName1)) {
            throw new DomainException('Admin Name 1 number cannot be null');
        }
        $this->adminName1 = $adminName1;
        return $this;
    }
    public function getAdminCode1(): string
    {
        return $this->adminCode1;
    }
    public function setAdminCode1(string $adminCode1): self
    {
        if (empty($adminCode1)) {
            throw new DomainException('Admin Code 1 number cannot be null');
        }
        $this->adminName1 = $adminCode1;
        return $this;
    }
    public function getAdminName2(): string
    {
        return $this->adminName2;
    }
    public function setAdminName2(string $adminName2): self
    {

        $this->adminName2 = $adminName2;
        return $this;
    }
    public function getAdminCode2(): string
    {
        return $this->adminCode2;
    }
    public function setAdminCode2(string $adminCode2): self
    {

        $this->adminName2 = $adminCode2;
        return $this;
    }
    public function getAdminName3(): string
    {
        return $this->adminName3;
    }
    public function setAdminName3(string $adminName3): self
    {

        $this->adminName3 = $adminName3;
        return $this;
    }
    public function getAdminCode3(): string
    {
        return $this->adminCode3;
    }
    public function setAdminCode3(string $adminCode3): self
    {

        $this->adminName3 = $adminCode3;
        return $this;
    }
    public function getLatitude(): string
    {
        return $this->latitude;
    }
    public function setLatitude(string $latitude): self
    {
        if (empty($latitude)) {
            throw new DomainException('Latitude number cannot be null');
        }
        $this->latitude = $latitude;
        return $this;
    }
    public function getLongitude(): string
    {
        return $this->longitude;
    }
    public function setLongitude(string $longitude): self
    {
        if (empty($longitude)) {
            throw new DomainException('Longitude number cannot be null');
        }
        $this->longitude = $longitude;
        return $this;
    }
    public function getAccuracy(): string
    {
        return $this->accuracy;
    }
    public function setAccuracy(string $accuracy): self
    {
        if (empty($accuracy)) {
            throw new DomainException('Accuracy number cannot be null');
        }
        $this->accuracy = $accuracy;
        return $this;
    }
    #[ArrayShape(['country' => "string", 'code' => "string", 'placeName' => "string", 'adminName1' => "string", 'adminName2' => "string", 'adminName3' => "string", 'latitude' => "string", 'longitude' => "string", 'accuracy' => "string"])] public function toArray(): array
    {
        return [
            'country' => $this->country,
            'code' => $this->code,
            'placeName' => $this->placeName,
            'adminName1' => $this->adminName1,
         //   'adminCode1' => $this->adminCode1,
            'adminName2' => $this->adminName2,
         //   'adminCode2' => $this->adminCode2,
            'adminName3' => $this->adminName3,
           // 'adminCode3' => $this->adminCode3,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'accuracy' => $this->accuracy,
        ];
    }


}
