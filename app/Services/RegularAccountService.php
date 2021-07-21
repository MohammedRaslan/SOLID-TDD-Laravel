<?php
namespace App\Services;

class RegularAccountService{

    public function calculateTotal($balance)
    {
        $total = $balance * 0.4;
        if($balance < 1000){
            $total -= $balance * 0.2;
        }
        return $total;
    }
}