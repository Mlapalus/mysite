<?php

namespace App\Tests\domain\InMemory;

use MySite\Domain\Gateway\ExperienceGatewayInterface;
use MySite\Domain\Model\Experience;
use Ramsey\Uuid\UuidInterface;

class ExperienceInMemoryRepository implements ExperienceGatewayInterface
{
    private array $experiences = [];

    public function save(Experience $experience): void
    {
        $this->experiences[$experience->getId()->__toString()] = $experience;
    }

    public function getExperienceById(UuidInterface $id): Experience
    {
        return $this->experiences[$id->__toString()];
    }

    public function update(Experience $experience): void
    {
        $this->experiences[$experience->getId()->__toString()] = $experience;
    }

    public function findAll(): array
    {
        return $this->experiences;
    }
}
