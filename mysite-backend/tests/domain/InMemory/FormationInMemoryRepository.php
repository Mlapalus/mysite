<?php

namespace App\Tests\domain\InMemory;

use MySite\Domain\Gateway\FormationGatewayInterface;
use MySite\Domain\Model\Formation;
use Ramsey\Uuid\UuidInterface;

class FormationInMemoryRepository implements FormationGatewayInterface
{
    private array $formations = [];

    public function save(Formation $formation): void
    {
        $this->formations[$formation->getId()->__toString()] = $formation;
    }

    public function getFormationById(UuidInterface $id): Formation
    {
        return $this->formations[$id->__toString()];
    }

    public function update(Formation $formation): void
    {
        $this->formations[$formation->getId()->__toString()] = $formation;
    }

    public function findAll(): array
    {
        return $this->formations;
    }
}
