<?php

namespace App\Http\Controllers;

use App\Interfaces\BankAccountInterface;
use Illuminate\Http\Request;
use App\Services\RegularAccountService;

class RegularAccountController extends Controller implements BankAccountInterface
{
    protected $RegularAccountService;

    public function __construct(RegularAccountService  $RegularAccountService) {
        $this->RegularAccountService = $RegularAccountService;
    }

    
    public function calculateTotal()
    {
        $balance = request()->all()['balance'];

        return response()->json(
            [
                'total' => $this->RegularAccountService->calculateTotal($balance)
            ]
        );
    } 
}
