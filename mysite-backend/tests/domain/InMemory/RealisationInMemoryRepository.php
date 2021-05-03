<?php 

namespace App\Tests\domain\InMemory;

use Ramsey\Uuid\UuidInterface;
use MySite\Domain\Model\Realisation;
use MySite\Domain\Gateway\RealisationGatewayInterface;

class RealisationInMemoryRepository implements RealisationGatewayInterface
{
    private array $realisations = [];

    public function save(Realisation $realisation): void
    {
        $this->realisations[$realisation->getId()->__toString()] = $realisation;
    }
    public function getRealisationById(UuidInterface $id): Realisation
    {
        return $this->realisations[$id->__toString()];
    }
    public function update(Realisation $realisation): void
    {
        $this->realisations[$realisation->getId()->__toString()] = $realisation;

    }
    public function findAll(): array
    {
        return $this->realisations;
    }
}