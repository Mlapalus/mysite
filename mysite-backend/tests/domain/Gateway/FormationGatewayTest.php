<?php

namespace App\Tests\domain\Gateway;

use DateTime;
use DateTimeInterface;
use MySite\Domain\Model\School;
use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Formation;
use MySite\Domain\Gateway\FormationGatewayInterface;
use App\Tests\domain\InMemory\FormationInMemoryRepository;

class FormationGatewayTest extends TestCase
{
    protected const TITLE_FORMATION = "Ma formation";
    protected const DESCRIPTION_FORMATION = "La description de mo formation";
    protected const NEW_TITLE_FORMATION = "Ma nouvelle formation";
    protected const NEW_DESCRIPTION_FORMATION = "La description de ma nouvelle formation";
    protected const CLASSNAME_DATE = "\DateTimeInterface";
    protected const CLASSNAME_COMPANY = "MySite\Domain\Model\Company";
    protected Formation $formation;
    protected School $school;
    protected DateTimeInterface $startDate;
    protected DateTimeInterface $endDate;
    protected array $tags;
    protected FormationGatewayInterface $repository;

    public function setUp(): void
    {
        $this->repository = new FormationInMemoryRepository;
        $this->formation = new Formation();
        $this->school = new School();
        $this->startDate = new DateTime("11-02-2020");
        $this->endDate = new DateTime("12-05-2021");
        $this->formation->create(
            self::TITLE_FORMATION,
            $this->school,
            self::DESCRIPTION_FORMATION,
            $this->startDate,
            $this->endDate
        );

        $this->repository->save($this->formation);
    }

    public function testSaveAndGetFormation()
    {
        $loadedFormation = $this->repository->getFormationById($this->formation->getId());

        $this->assertEquals($this->formation, $loadedFormation);
    }

    public function testUpdateFormation()
    {
        $this->formation->create(
            self::NEW_TITLE_FORMATION,
            $this->school,
            self::NEW_DESCRIPTION_FORMATION,
            $this->startDate,
            $this->endDate
        );

        $this->repository->update($this->formation);
        $loadedFormation = $this->repository->getFormationById($this->formation->getId());

        $this->assertEquals($this->formation, $loadedFormation);
    }

    public function testFindAllFormation()
    {
        $newFormation = new Formation();
        $newFormation->create(
            self::NEW_TITLE_FORMATION,
            $this->school,
            self::NEW_DESCRIPTION_FORMATION,
            $this->startDate,
            $this->endDate,
        );

        $this->repository->save($newFormation);

        $formations = $this->repository->findAll();

        $this->assertIsArray($formations);
        $this->assertEquals(2, count($formations));
        $this->assertContainsOnlyInstancesOf('MySite\Domain\Model\Formation', $formations);
    }
}
