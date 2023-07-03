<?php
// src/Entity/Budget.php
namespace App\Entity;

use App\Interface\BudgetInterface;

class Budget implements BudgetInterface
{
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function deductAmount(float $amount): void
    {
        $this->amount -= $amount;
    }

    public function getRemainingAmount(): float
    {
        return $this->amount;
    }
}
