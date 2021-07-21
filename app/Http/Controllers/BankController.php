<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function store()
    {
        Bank::create($this->validateRequest());
    }


    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'address' => 'required'
        ]);
    }
    
}
