<?php

namespace App\Entity;

use App\Interface\FilmInterface;

class Film implements FilmInterface
{
    private $canStartShooting;
    private $staffExpenses;
    private $fixedExpenses;

    public function __construct(bool $canStartShooting, array $staffExpenses, float $fixedExpenses)
    {
        $this->canStartShooting = $canStartShooting;
        $this->staffExpenses = $staffExpenses;
        $this->fixedExpenses = $fixedExpenses;
    }

    public function canStartShooting(): bool
    {
        return $this->canStartShooting;
    }

    public function getStaffExpenses(): array
    {
        return $this->staffExpenses;
    }

    public function getFixedExpenses(): float
    {
        return $this->fixedExpenses;
    }
}