<?php
namespace App\Classes;

use App\Interfaces\BankAccountInterface;

class SavingAccountService implements BankAccountInterface{

    public function calculateTotal($balance)
    {
        $total = $balance * 0.5;
        return $total;
    }
}