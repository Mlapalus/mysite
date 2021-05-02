<?php 

namespace MySite\Domain\Gateway;

use MySite\Domain\Model\Experience;

interface ExperienceGatewayInterface {
    public function save(Experience $experience): void;
    public function getExperienceByTitle(string $title): Experience;
}