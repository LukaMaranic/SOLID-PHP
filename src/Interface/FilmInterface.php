<?php

namespace App\Interface;

interface FilmInterface
{
    public function canStartShooting(): bool;
    public function getStaffExpenses(): array;
    public function getFixedExpenses(): float;
}