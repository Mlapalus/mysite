<?php 

namespace MySite\Domain\Model;

use DateTime;
use DateTimeInterface;

class Realisation 
{
    private string $title;
    private string $url;
    private string $description;
    private string $img;
    private DateTimeInterface $createdDate;
    private array $tags;

    public function __construct()
    {
        $this->title = "";
        $this->url = "";
        $this->description = "";
        $this->img = "";
        $this->createdDate = new DateTime();
        $this->tags = [];
    }
    
    public function create(
        string $title,
        string $url,
        string $description,
        string $img,
        array $tags,
        DateTime $createdDate
    ) {
        $this->title = $title;
        $this->url = $url;
        $this->description = $description;
        $this->img = $img;
        $this->tags = $tags;
        $this->createdDate = $createdDate;
    }


    /**
     * Get the value of title
     */ 
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of img
     */ 
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * Get the value of createdDate
     */ 
    public function getCreatedDate(): DateTimeInterface
    {
        return $this->createdDate;
    }

    /**
     * Get the value of tags
     */ 
    public function getTags(): array
    {
        return $this->tags;
    }
}