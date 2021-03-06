<?php

namespace Core\Domain\Entities\Location;

use DomainException;
use JetBrains\PhpStorm\ArrayShape;

class Country
{
    // todo: implement all atributes of object

    private string $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function setName(string $name): self
    {
        if (empty($name)) {
            throw new DomainException('Name cannot be null');
        }
        $this->name = $name;
        return $this;
    }
    public function setCode(string $code): self
    {
        if (empty($name)) {
            throw new DomainException('Name cannot be null');
        }
        $this->name = $name;
        return $this;
    }
    public function setContinent(string $continent): self
    {
        if (empty($name)) {
            throw new DomainException('Name cannot be null');
        }
        $this->name = $name;
        return $this;
    }
    public function setGeonameid(string $geonameid): self
    {
        if (empty($name)) {
            throw new DomainException('Name cannot be null');
        }
        $this->name = $name;
        return $this;
    }




    #[ArrayShape(['name' => "string"])] public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
