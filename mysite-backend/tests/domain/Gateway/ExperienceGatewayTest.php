<?php 

namespace App\Tests\domain\Gateway;

use DateTime;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;
use MySite\Domain\Model\Company;
use MySite\Domain\Model\Experience;
use MySite\Domain\Gateway\ExperienceGatewayInterface;
use App\Tests\domain\InMemory\ExperienceInMemoryRepository;

class ExperienceGatewayTest extends TestCase
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
    protected ExperienceGatewayInterface $repository;

    public function setUp(): void
    {
        $this->repository = new ExperienceInMemoryRepository;
        $this->experience = new Experience();
        $this->company = new Company();
        $this->startDate = new DateTime("11-02-2020");
        $this->endDate = new DateTime("12-05-2021");
        $this->tags = ["PHP", "HTML", "CSS"];
    }

    public function testSaveAndGetExperience()
    {
        $experience = new Experience();
        $this->experience->create(
            self::NEW_TITLE_EXPERIENCE,
            $this->company,
            self::NEW_DESCRIPTION_EXPERIENCE,
            $this->startDate,
            $this->endDate,
            $this->tags
        );

        $this->repository->save($this->experience);

        $newExperience = $this->repository->getExperienceByTitle($this->experience->getTitle()); 

        $this->assertEquals($this->experience, $newExperience);
    }
}
