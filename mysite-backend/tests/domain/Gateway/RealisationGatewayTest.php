<?php 

namespace App\Tests\domain\Gateway;


use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Realisation;
use MySite\Domain\Gateway\RealisationGatewayInterface;
use App\Tests\domain\InMemory\RealisationInMemoryRepository;
use DateTime;

class RealisationGatewayTest extends TestCase 
{

    protected const TITLE_REALISATION = "Titre de ma réalisation";
    protected const DESCRIPTION_REALISATION = "Description de ma réalisation";
    protected const URL_REALISATION = "https://toto.com";
    protected const IMG_REALISATION = "https://toto.com";
    protected const NEW_TITLE_REALISATION = "Ma nouvelle réalisation";
    protected const NEW_DESCRIPTION_REALISATION = "La description de ma nouvelle réalisation";
    protected const CLASSNAME_DATE = "\DateTimeInterface";
    

    private RealisationGatewayInterface $repository;
    private DateTime $startDate;
    private Realisation $realisation;

    public function setUp(): void
    {
        $this->repository = new RealisationInMemoryRepository;
        $this->startDate = new DateTime(12 - 3 - 2022);
        $this->realisation = new Realisation();
        $this->realisation->create(
            self::TITLE_REALISATION,
            self::URL_REALISATION,
            self::DESCRIPTION_REALISATION,
            self::IMG_REALISATION,
            [],
            $this->startDate
        );

        $this->repository->save($this->realisation);
    }

    public function testSaveAndGetRealistion()
    {
        $loadedRealisation = $this->repository->getRealisationById($this->realisation->getId());
        $this->assertEquals($this->realisation, $loadedRealisation);

    }

    public function testUpdateRealisation()
    {
        $this->realisation->create(
            self::NEW_TITLE_REALISATION,
            self::URL_REALISATION,
            self::NEW_DESCRIPTION_REALISATION,
            self::IMG_REALISATION,
            ["PHP"],
            $this->startDate
        );

        $this->repository->update($this->realisation);
        $loadedRealisation = $this->repository->getRealisationById($this->realisation->getId());

        $this->assertEquals($this->realisation, $loadedRealisation);
    }

    public function testFindAllFormation()
    {
        $newRealisation = new Realisation();
        $newRealisation->create(
            self::TITLE_REALISATION,
            self::URL_REALISATION,
            self::NEW_DESCRIPTION_REALISATION,
            self::IMG_REALISATION,
            ["CSS"],
            $this->startDate
        );

        $this->repository->save($newRealisation);

        $realisations = $this->repository->findAll();

        $this->assertIsArray($realisations);
        $this->assertEquals(2, count($realisations));
        $this->assertContainsOnlyInstancesOf('MySite\Domain\Model\Realisation', $realisations);
    }
}