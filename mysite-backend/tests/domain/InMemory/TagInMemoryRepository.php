<?php

namespace App\Tests\domain\InMemory;

use Ramsey\Uuid\UuidInterface;
use MySite\Domain\Model\Tag;
use MySite\Domain\Gateway\TagGatewayInterface;

class TagInMemoryRepository implements TagGatewayInterface
{

    private array $tags = [];


    public function save(Tag $tag): void
    {
        $this->tags[$tag->getId()->__toString()] = $tag;
    }

    public function getTagById(UuidInterface $id): Tag
    {
        return $this->tags[$id->__toString()];
    }
    public function update(Tag $tag): void
    {
        $this->tags[$tag->getId()->__toString()] = $tag;
    }
    public function findAll(): array
    {
        return $this->tags;
    }
}
