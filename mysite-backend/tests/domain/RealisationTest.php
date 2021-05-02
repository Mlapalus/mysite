<?php 

namespace App\Tests;

use DateTime;
use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Realisation;

class RealisationTest extends TestCase
{

    protected Realisation $realisation;
    protected DateTime $createdDate;

    protected const NEW_TITLE_REALISATION = "Ma nouvelle Réalisation";
    protected const NEW_URL_REALISATION = "Url de ma nouvelle réalisation";
    protected const NEW_DESCRIPTION_REALISATION = "Description de ma nouvelle réalisation";
    protected const NEW_IMG_REALISATION = "Image de ma nouvelle réalisation";

    public function setUp(): void
    {
        $this->realisation = new Realisation();
        $this->createdDate = new DateTime("11-02-2020");
        $this->tags = ["HTML", "PHP"];
        
    }

    public function testNewRealisation()
    {
        $this->assertEmpty($this->realisation->getTitle());
        $this->assertEmpty($this->realisation->getImg());
        $this->assertEmpty($this->realisation->getUrl());
        $this->assertEmpty($this->realisation->getDescription());
        $this->assertInstanceOf("\DateTimeInterface", $this->realisation->getCreatedDate());
        $this->assertEmpty($this->realisation->getTags());
    }

    public function testCreateRealisation()
    {
        $this->realisation->create(
            self::NEW_TITLE_REALISATION,
            self::NEW_URL_REALISATION,
            self::NEW_DESCRIPTION_REALISATION,
            self::NEW_IMG_REALISATION,
            $this->tags,
            $this->createdDate
        );

        $this->assertEquals(self::NEW_TITLE_REALISATION, $this->realisation->getTitle());
        $this->assertEquals( self::NEW_IMG_REALISATION, $this->realisation->getImg());
        $this->assertEquals(self::NEW_URL_REALISATION, $this->realisation->getUrl());
        $this->assertEquals(self::NEW_DESCRIPTION_REALISATION, $this->realisation->getDescription());
        $this->assertInstanceOf("\DateTimeInterface", $this->realisation->getCreatedDate());
        $this->assertEquals($this->tags, $this->realisation->getTags());
    }
}
