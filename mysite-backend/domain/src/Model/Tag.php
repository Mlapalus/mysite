<?php

namespace MySite\Domain\Model;

class Tag
{
    private string $name;

    public function __construct()
    {
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
}