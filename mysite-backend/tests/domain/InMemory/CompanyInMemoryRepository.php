<?php 

namespace App\Tests\domain\InMemory;

use Ramsey\Uuid\UuidInterface;
use MySite\Domain\Model\Company;
use MySite\Domain\Gateway\CompanyGatewayInterface;

class CompanyInMemoryRepository implements CompanyGatewayInterface
{

    private array $companies = [];


    public function save(Company $company): void
    {
        $this->companies[$company->getId()->__toString()] = $company;
    }

    public function getCompanyById(UuidInterface $id): Company
    {
        return $this->companies[$id->__toString()];

    }
    public function update(Company $company): void
    {
        $this->companies[$company->getId()->__toString()] = $company;
    }
    public function findAll(): array
    {
        return $this->companies;
    }
}