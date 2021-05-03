<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Formation;
use Ramsey\Uuid\UuidInterface;

interface FormationGatewayInterface
{
    public function save(Formation $formation): void;
    public function getFormationById(UuidInterface $id): Formation;
    public function update(Formation $formation): void;
    public function findAll(): array;
}
