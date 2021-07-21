<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SavingAccountService;
use App\Interfaces\BankAccountInterface;

class SavingAccountController extends Controller implements BankAccountInterface
{
    protected $SavingAccountService;

    public function __construct(SavingAccountService  $SavingAccountService) {
        $this->SavingAccountService = $SavingAccountService;
    }

    public function calculateTotal()
    {
        $balance = request()->all()['balance'];

        return response()->json(
            [
                'total' => $this->SavingAccountService->calculateTotal($balance)
            ]
        );
    }
}
