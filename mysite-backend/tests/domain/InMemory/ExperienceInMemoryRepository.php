<?php 

namespace App\Tests\domain\InMemory;

use MySite\Domain\Gateway\ExperienceGatewayInterface;
use MySite\Domain\Model\Experience;

class ExperienceInMemoryRepository implements ExperienceGatewayInterface
{
    private array $experiences = [];

    public function save(Experience $experience): void
    {
        $this->experiences[$experience->getTitle()] = $experience;
    }

    public function getExperienceByTitle(string $title): Experience
    {
        return $this->experiences[$title];
    }
}