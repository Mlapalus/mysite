<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\School;
use Ramsey\Uuid\UuidInterface;

interface SchoolGatewayInterface
{
    public function save(School $school): void;
    public function getSchoolById(UuidInterface $id): School;
    public function update(School $school): void;
    public function findAll(): array;
}
