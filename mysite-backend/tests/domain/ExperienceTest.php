<?php

namespace App\Tests;

use DateTime;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Company;
use MySite\Domain\Model\Experience;

class ExperienceTest extends TestCase
{
    protected const NEW_TITLE_EXPERIENCE = "Ma nouvelle expérience";
    protected const CLASSNAME_DATE = "\DateTimeInterface";
    protected const CLASSNAME_COMPANY = "MySite\Domain\Model\Company";
    protected const NEW_DESCRIPTION_EXPERIENCE = "La description de ma nouvelle expérience";

    protected Experience $experience;
    protected Company $company;
    protected DateTimeInterface $startDate;
    protected DateTimeInterface $endDate;
    protected array $tags;

    public function setUp(): void
    {
        $this->experience = new Experience();
        $this->company = new Company();
        $this->startDate = new DateTime("11-02-2020");
        $this->endDate = new DateTime("12-05-2021");
        $this->tags = ["PHP", "HTML", "CSS"];
    }

    public function testNewExperience()
    {
        $this->assertEmpty($this->experience->getTitle());
        $this->assertEmpty($this->experience->getDescription());
        $this->assertEmpty($this->experience->getCompany());
        $this->assertEmpty($this->experience->getDescription());
        $this->assertEmpty($this->experience->getTags());
        $this->assertIsArray($this->experience->getTags());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->experience->getStartDate());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->experience->getEndDate());
    }

    public function testMethodCreate()
    {
        $this->experience->create(
            self::NEW_TITLE_EXPERIENCE,
            $this->company,
            self::NEW_DESCRIPTION_EXPERIENCE,
            $this->startDate,
            $this->endDate,
            $this->tags
        );

        $this->assertEquals(self::NEW_TITLE_EXPERIENCE, $this->experience->getTitle());
        $this->assertEquals(self::NEW_DESCRIPTION_EXPERIENCE, $this->experience->getDescription());
        $this->assertInstanceOf(self::CLASSNAME_COMPANY, $this->experience->getCompany());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->experience->getStartDate());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->experience->getEndDate());
        $this->assertEquals($this->tags, $this->experience->getTags());
    }
}
