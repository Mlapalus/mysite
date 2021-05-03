<?php

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Company;
use Ramsey\Uuid\UuidInterface;

interface CompanyGatewayInterface
{
    public function save(Company $company): void;
    public function getCompanyById(UuidInterface $id): Company;
    public function update(Company $company): void;
    public function findAll(): array;
}
