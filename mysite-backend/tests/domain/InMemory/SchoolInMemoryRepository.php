<?php

namespace App\Tests\domain\InMemory;

use Ramsey\Uuid\UuidInterface;
use MySite\Domain\Model\School;
use MySite\Domain\Gateway\SchoolGatewayInterface;

class SchoolInMemoryRepository implements SchoolGatewayInterface
{

    private array $schools = [];


    public function save(School $school): void
    {
        $this->schools[$school->getId()->__toString()] = $school;
    }

    public function getSchoolById(UuidInterface $id): School
    {
        return $this->schools[$id->__toString()];
    }
    public function update(School $school): void
    {
        $this->schools[$school->getId()->__toString()] = $school;
    }
    public function findAll(): array
    {
        return $this->schools;
    }
}
