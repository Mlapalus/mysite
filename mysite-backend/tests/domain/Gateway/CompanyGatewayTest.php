<?php

namespace App\Tests\domain\Gateway;

use PHPUnit\Framework\TestCase;
use App\Tests\domain\InMemory\CompanyInMemoryRepository;
use MySite\Domain\Gateway\CompanyGatewayInterface;
use MySite\Domain\Model\Company;
use Symfony\Flex\ComposerRepository;

class CompanyGatewayTest extends TestCase
{
    private CompanyGatewayInterface $repository;
    private Company $company;
    private string $nameCompany;
    private string $urlCompany;
    private string $imgCompany;

    protected const NAME_COMPANY = "Le nom de la société";
    protected const NEW_NAME_COMPANY = "Le nouveau nom de la société";
    protected const IMG_COMPANY = "L'image de la société";
    protected const URL_COMPANY = "L'url du site de le société";

    public function setUp(): void
    {
        $this->repository = new CompanyInMemoryRepository();
        $this->company = new Company();
        $this->company->create(
            self::NAME_COMPANY,
            self::IMG_COMPANY,
            self::URL_COMPANY
        );

        $this->repository->save($this->company);
    }

    public function testSaveAndGetCompany()
    {
        $loadedCompany = $this->repository->getCompanyById($this->company->getId());

        $this->assertEquals($this->company, $loadedCompany);
    }


    public function testUpdateCompany()
    {
        $this->company->create(
            self::NEW_NAME_COMPANY,
            self::IMG_COMPANY,
            self::URL_COMPANY
        );

        $this->repository->update($this->company);
        $loadedCompany = $this->repository->getCompanyById($this->company->getId());

        $this->assertEquals($this->company, $loadedCompany);
    }

    public function testFindAllCompany()
    {
        $newCompany = new Company();
        $newCompany->create(
            self::NEW_NAME_COMPANY,
            self::IMG_COMPANY,
            self::URL_COMPANY
        );

        $this->repository->save($newCompany);

        $companies = $this->repository->findAll();

        $this->assertIsArray($companies);
        $this->assertEquals(2, count($companies));
        $this->assertContainsOnlyInstancesOf('MySite\Domain\Model\Company', $companies);
    }
}
