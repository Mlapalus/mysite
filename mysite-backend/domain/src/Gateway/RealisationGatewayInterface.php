<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Realisation;
use Ramsey\Uuid\UuidInterface;

interface RealisationGatewayInterface
{
    public function save(Realisation $realisation): void;
    public function getRealisationById(UuidInterface $id): Realisation;
    public function update(Realisation $realisation): void;
    public function findAll(): array;
}
