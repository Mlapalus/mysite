<?php

namespace MySite\Domain\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Tag
{
    private UuidInterface $id;
    private string $name;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->name = "";
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
