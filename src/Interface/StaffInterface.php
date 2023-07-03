<?php

namespace App\Interface;

interface StaffInterface
{
    public function getSalaryType(): string;
    public function getSalaryAmount(): float;
}