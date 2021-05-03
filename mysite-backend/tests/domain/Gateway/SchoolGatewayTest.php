<?php

namespace App\Tests\domain\Gateway;

use PHPUnit\Framework\TestCase;
use App\Tests\domain\InMemory\SchoolInMemoryRepository;
use MySite\Domain\Gateway\SchoolGatewayInterface;
use MySite\Domain\Model\School;

class SchoolGatewayTest extends TestCase
{
    private SchoolGatewayInterface $repository;
    private School $school;
    private string $nameSchool;
    private string $urlSchool;
    private string $imgSchool;

    protected const NAME_SCHOOL = "Le nom de l'école";
    protected const NEW_NAME_SCHOOL = "Le nouveau nom de l'école";
    protected const IMG_SCHOOL = "L'image de l'école";
    protected const URL_SCHOOL = "L'url du site de l'école";

    public function setUp(): void
    {
        $this->repository = new SchoolInMemoryRepository();
        $this->school = new School();
        $this->school->create(
            self::NAME_SCHOOL,
            self::IMG_SCHOOL,
            self::URL_SCHOOL
        );

        $this->repository->save($this->school);
    }

    public function testSaveAndGetSchool()
    {
        $loadedSchool = $this->repository->getSchoolById($this->school->getId());

        $this->assertEquals($this->school, $loadedSchool);
    }


    public function testUpdateSchool()
    {
        $this->school->create(
            self::NEW_NAME_SCHOOL,
            self::IMG_SCHOOL,
            self::URL_SCHOOL
        );

        $this->repository->update($this->school);
        $loadedSchool = $this->repository->getSchoolById($this->school->getId());

        $this->assertEquals($this->school, $loadedSchool);
    }

    public function testFindAllSchool()
    {
        $newSchool = new School();
        $newSchool->create(
            self::NEW_NAME_SCHOOL,
            self::IMG_SCHOOL,
            self::URL_SCHOOL
        );

        $this->repository->save($newSchool);

        $schools = $this->repository->findAll();

        $this->assertIsArray($schools);
        $this->assertEquals(2, count($schools));
        $this->assertContainsOnlyInstancesOf('MySite\Domain\Model\School', $schools);
    }
}
