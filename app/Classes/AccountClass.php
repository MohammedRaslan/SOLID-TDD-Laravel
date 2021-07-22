<?php
namespace App\Classes;

use App\Interfaces\BankAccountInterface;

class AccountClass
{
    protected $AccountType;
    public function __construct(BankAccountInterface $AccountType) {
        $this->AccountType = $AccountType;
    }

    public function calculateTotal($balance)
    {
        return $this->AccountType->calculateTotal($balance);
    }
}