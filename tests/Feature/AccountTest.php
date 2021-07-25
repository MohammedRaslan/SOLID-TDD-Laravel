<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Account;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    
    /** @test */
    public function save_account_data()
    {
        $this->withoutExceptionHandling();
        $this->post('account/store',$this->accountData());
        $this->assertCount(1,Account::all());
    }
    

    /** @test */
    public function calculate_total_for_regular_account()
    {   $this->withoutExceptionHandling();
        $x = $this->post('account/store',$this->accountData());
        $response = $this->post('account/regular/calculate',['balance' => Account::find(1)->balance]);
        $response->assertJson([
            'total' => 40,
        ]);
    }

    /** @test */
    public function calculate_total_for_saving_account()
    {   $this->withoutExceptionHandling();
        $this->post('account/store',$this->accountData());
        $response = $this->post('account/saving/calculate',['balance' => Account::find(1)->balance]);
        $response->assertJson([
            'total' => 100,
        ]);
    }


    private function accountData(){
        return [
            'fname' => 'Mohamed',
            'lname' => 'Raslan',
            'phone' => '01111295259',
            'balance' => 200,
        ];
    }
}
