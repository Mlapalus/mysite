<?php

namespace App\Tests;

use MySite\Domain\Model\School;
use PHPUnit\Framework\TestCase;

class SchoolTest extends TestCase
{
    protected const NEW_NAME_SCHOOL = "Ma nouvelle école";
    protected const NEW_IMAGE_SCHOOL = "url de l'image";
    protected const NEW_URL_SCHOOL = "url du site de l'école";

    protected School $school;

    public function setUp(): void
    {
        $this->school = new School();
    }

    public function testNewSchool()
    {
        $this->assertEmpty($this->school->getName());
        $this->assertEmpty($this->school->getImg());
        $this->assertEmpty($this->school->getUrl());
    }

    public function testMethodCreate()
    {
        $this->school->create(
            self::NEW_NAME_SCHOOL,
            self::NEW_IMAGE_SCHOOL,
            self::NEW_URL_SCHOOL
        );

        $this->assertEquals(self::NEW_NAME_SCHOOL, $this->school->getName());
        $this->assertEquals(self::NEW_IMAGE_SCHOOL, $this->school->getImg());
        $this->assertEquals(self::NEW_URL_SCHOOL, $this->school->getUrl());
    }
}
