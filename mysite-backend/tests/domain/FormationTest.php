<?php 

namespace App\Tests;

use DateTime;
use MySite\Domain\Model\School;
use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Formation;

class FormationTest extends TestCase
{
    protected Formation $formation;
    protected DateTime $startDate;
    protected DateTime $endDate;
    protected School $school;

    protected const NEW_TITLE_FORMATION = "Ma nouvelle Formation";
    protected const NEW_DESCRIPTION_FORMATION = "La description de ma nouvelle Formation";
    protected const CLASSNAME_DATE = "\DateTimeInterface";
    protected const CLASSNAME_SCHOOL = "MySite\Domain\Model\School";

    public function setUp(): void 
    {
        $this->formation = new Formation();
        $this->school = new School();
        $this->startDate = new DateTime('10-6-2020');
        $this->endDate = new DateTime('11-7-2021');
    }

    public function testNewFormationCreateAEmptyFormation()
    {
        $this->assertEmpty($this->formation->getTitle());
        $this->assertEmpty($this->formation->getSchool());
        $this->assertEmpty($this->formation->getDescription());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->formation->getStartDate());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->formation->getEndDate());
    }

    public function testMethodCreate()
    {
        $this->formation->create(
            self::NEW_TITLE_FORMATION,
            $this->school,
            self::NEW_DESCRIPTION_FORMATION,
            $this->startDate,
            $this->endDate
        );

        $this->assertEquals(self::NEW_TITLE_FORMATION ,$this->formation->getTitle());
        $this->assertInstanceOf(self::CLASSNAME_SCHOOL,$this->formation->getSchool());
        $this->assertEquals(self::NEW_DESCRIPTION_FORMATION ,$this->formation->getDescription());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->formation->getStartDate());
        $this->assertInstanceOf(self::CLASSNAME_DATE, $this->formation->getEndDate());
    }
}
