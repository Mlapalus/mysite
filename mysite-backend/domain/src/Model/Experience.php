<?php

namespace MySite\Domain\Model;

use DateTime;
use DateTimeInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Experience
{
    private UuidInterface $id;
    private string $title;
    private string $description;
    private ?DateTimeInterface $startDate;
    private ?DateTimeInterface $endDate;
    private ?Company $company;
    private array $tags;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->title = "";
        $this->description = "";
        $this->startDate = new DateTime();
        $this->endDate = new DateTime();
        $this->company = null;
        $this->tags = [];
    }

    public function create(
        string $title,
        Company $company,
        string $description,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate,
        array $tags
    ) {
        $this->title = $title;
        $this->company = $company;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->tags = $tags;
    }


    public function getTags(): ?array
    {
        return $this->tags;
    }
    public function getCompany(): ?Company
    {
        return $this->company;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * Get the value of id
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
}
