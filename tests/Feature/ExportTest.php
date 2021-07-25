<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExportTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function export_data_as_php_file()
    {
        $this->withoutExceptionHandling();
        $account = $this->post('account/store',$this->accountData());
        if($account->assertStatus(200)){
            $response = $this->post('export',array_merge($this->accountData(),['extension' => 'PHP']));
            $response->assertJson([
                'message' => 'PHP File Exported',
            ]);
        }
     
    }

    /** @test */
    public function export_data_as_json_file()
    {
        $this->withoutExceptionHandling();
        $account = $this->post('account/store',$this->accountData());
        if($account->assertStatus(200)){
            $response = $this->post('export',array_merge($this->accountData(),['extension' => 'Json']));
            $response->assertJson([
                'message' => 'Json File Exported',
            ]);
        }
    }


    private function accountData(){
        return [
            'fname' => 'Mohamed',
            'lname' => 'Raslan',
            'phone' => '01111295259',
            'balance' => 200,
            'extension' => ''
        ];
    }

    
}
