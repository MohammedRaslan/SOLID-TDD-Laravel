<?php
namespace App\Services;

class SavingAccountService{

    public function calculateTotal($balance)
    {
        $total = $balance * 0.5;
        return $total;
    }
}