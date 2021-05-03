<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Tag;
use Ramsey\Uuid\UuidInterface;

interface TagGatewayInterface
{
    public function save(Tag $tag): void;
    public function getTagById(UuidInterface $id): Tag;
    public function update(Tag $tag): void;
    public function findAll(): array;
}
