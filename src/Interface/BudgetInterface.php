<?php

namespace App\Interface;

interface BudgetInterface
{
    public function deductAmount(float $amount): void;
    public function getRemainingAmount(): float;
}