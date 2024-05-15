<?php

namespace App\Contracts;

interface DataValidationAudienceLogInterface
{
    public function validateData(array $data): bool;
}
