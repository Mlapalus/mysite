<?php

namespace MySite\Domain\Model;

use DateTime;
use Ramsey\Uuid\Uuid;
use DateTimeInterface;
use Ramsey\Uuid\UuidInterface;

class Formation
{
    private UuidInterface $id;
    private string $title = "";
    private ?string $description = "";
    private ?School $school = null;
    private DateTimeInterface $startDate;
    private DateTimeInterface $endDate;

    public function __construct()
    {
        $this->id = Uuid::uuid4();
        $this->startDate = new DateTime();
        $this->endDate = new DateTime();
    }

    public function create(
        string $title,
        School $school,
        string $description,
        DateTimeInterface $startDate,
        DateTimeInterface $endDate
    ) {
        $this->title = $title;
        $this->school = $school;
        $this->description = $description;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of school
     */
    public function getSchool(): ?School
    {
        return $this->school;
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
