<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Experience;
use Ramsey\Uuid\UuidInterface;

interface ExperienceGatewayInterface
{
    public function save(Experience $experience): void;
    public function getExperienceById(UuidInterface $id): Experience;
    public function update(Experience $experience): void;
    public function findAll(): array;
}
