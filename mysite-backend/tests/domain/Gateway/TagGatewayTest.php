<?php

namespace App\Tests\domain\Gateway;

use PHPUnit\Framework\TestCase;
use App\Tests\domain\InMemory\TagInMemoryRepository;
use MySite\Domain\Gateway\TagGatewayInterface;
use MySite\Domain\Model\Tag;

class TagGatewayTest extends TestCase
{
    private TagGatewayInterface $repository;
    private Tag $tag;
    private string $nameTag;
    private string $urlTag;
    private string $imgTag;

    protected const NAME_TAG = "PHP";
    protected const NEW_NAME_TAG = "JAVA";
    
    public function setUp(): void
    {
        $this->repository = new TagInMemoryRepository();
        $this->tag = new Tag();
        $this->tag->setName(self::NAME_TAG);

        $this->repository->save($this->tag);
    }

    public function testSaveAndGetTag()
    {
        $loadedTag = $this->repository->getTagById($this->tag->getId());

        $this->assertEquals($this->tag, $loadedTag);
    }

    public function testUpdateTag()
    {
        $this->tag->setName(self::NEW_NAME_TAG);

        $this->repository->update($this->tag);
        $loadedTag = $this->repository->getTagById($this->tag->getId());

        $this->assertEquals($this->tag, $loadedTag);
    }

    public function testFindAllTag()
    {
        $newTag = new Tag();
        $newTag->setName(self::NEW_NAME_TAG);

        $this->repository->save($newTag);

        $Tags = $this->repository->findAll();

        $this->assertIsArray($Tags);
        $this->assertEquals(2, count($Tags));
        $this->assertContainsOnlyInstancesOf('MySite\Domain\Model\Tag', $Tags);
    }
}
