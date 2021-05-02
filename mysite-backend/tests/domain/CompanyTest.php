<?php

namespace App\Tests;

use MySite\Domain\Model\Company;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    protected const NEW_NAME_COMPANY = "Ma nouvelle entreprise";
    protected const NEW_IMAGE_COMPANY = "url de l'image";
    protected const NEW_URL_COMPANY = "url du site de l'entreprise";

    protected Company $school;

    public function setUp(): void
    {
        $this->company = new Company();
    }

    public function testNewCompany()
    {
        $this->assertEmpty($this->company->getName());
        $this->assertEmpty($this->company->getImg());
        $this->assertEmpty($this->company->getUrl());
    }

    public function testMethodCreate()
    {
        $this->company->create(
            self::NEW_NAME_COMPANY,
            self::NEW_IMAGE_COMPANY,
            self::NEW_URL_COMPANY
        );

        $this->assertEquals(self::NEW_NAME_COMPANY, $this->company->getName());
        $this->assertEquals(self::NEW_IMAGE_COMPANY, $this->company->getImg());
        $this->assertEquals(self::NEW_URL_COMPANY, $this->company->getUrl());
    }
}
