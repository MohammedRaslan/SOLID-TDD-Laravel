<?php

namespace App\Http\Controllers;

use App\Classes\AccountClass;
use App\Classes\RegularAccountService;
use App\Interfaces\BankAccountInterface;
use App\Classes\SavingAccountService;
use App\Repositories\AccountRepository;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  
    public function calculateRegularAccountTotal()
    {
        $balance = request()->all()['balance'];
        $total   = new AccountClass(new RegularAccountService);
        return response()->json(
            [
                'total' =>  $total->calculateTotal($balance)
            ]
        );
    }

    public function calculateSavingAccountTotal()
    {
        $balance = request()->all()['balance'];
        $total   = new AccountClass(new SavingAccountService);
        return response()->json(
            [
                'total' =>  $total->calculateTotal($balance)
            ]
        );
    }

    public function store(Request $request,AccountRepository $AccountRepository)
    {
        $AccountRepository->store($request->all());
    }
}
