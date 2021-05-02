<?php 

namespace App\Tests;

use MySite\Domain\Model\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    protected Tag $tag;

    public function setUp(): void
    {
        $this->tag = new Tag();
    }

    public function testCreateTag()
    {
        $this->assertEmpty($this->tag->getName());
    }

    public function testNewTag()
    {
        $this->tag->setName("HTML");
        $this->assertEquals("HTML", $this->tag->getName());
    }
}