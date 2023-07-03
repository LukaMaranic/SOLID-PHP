<?php

namespace App\Service;

use App\Interface\BudgetInterface;
use App\Interface\FilmInterface;
use Exception;

class ProductionCompany
{
    private $budget;

    public function __construct(BudgetInterface $budget)
    {
        $this->budget = $budget;
    }

    public function produceFilm(FilmInterface $film, int $months): float
    {
        if (!$film->canStartShooting()) {
            throw new Exception('Film cannot start shooting yet.');
        }

        $totalExpenses = $film->getFixedExpenses();

        $staffExpenses = $film->getStaffExpenses();
        foreach ($staffExpenses as $staff) {
            $salaryType = $staff->getSalaryType();
            $salaryAmount = $staff->getSalaryAmount();

            if ($salaryType === 'monthly') {
                $totalExpenses += $salaryAmount * $months;
            } elseif ($salaryType === 'fixed') {
                $totalExpenses += $salaryAmount;
            }
        }

        if ($totalExpenses > $this->budget->getRemainingAmount()) {
            throw new Exception('Budget limit reached. Cannot produce the film.');
        }

        $this->budget->deductAmount($totalExpenses);

        return $totalExpenses;
    }
}