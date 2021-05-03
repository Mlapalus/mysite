<?php

namespace MySite\Domain\Model;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class School
{
    private UuidInterface $id;
    private string $name;
    private string $img;
    private string $url;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->name = "";
        $this->img = "";
        $this->url = "";
    }

    public function create(
        string $name,
        string $img,
        string $url
    ) {
        $this->name = $name;
        $this->img = $img;
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImg(): string
    {
        return $this->img;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get the value of id
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
