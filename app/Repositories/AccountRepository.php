<?php
namespace App\Repositories;

use App\Models\Account;

class AccountRepository{

    protected $account;
    public function __construct(Account $account) {
        $this->account = $account;
    }

    public function store($data)
    {
        $newAccount = $this->account->create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'balance' => $data['balance'],
        ]);
        return $newAccount == true ? true : false;
    }
}