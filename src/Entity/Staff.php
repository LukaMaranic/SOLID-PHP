<?php

namespace App\Entity;

use App\Interface\StaffInterface;

class Staff implements StaffInterface
{
    private $salaryType;
    private $salaryAmount;

    public function __construct(string $salaryType, float $salaryAmount)
    {
        $this->salaryType = $salaryType;
        $this->salaryAmount = $salaryAmount;
    }

    public function getSalaryType(): string
    {
        return $this->salaryType;
    }

    public function getSalaryAmount(): float
    {
        return $this->salaryAmount;
    }
}