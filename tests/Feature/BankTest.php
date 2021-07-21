<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Bank;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BankTest extends TestCase
{
    use RefreshDatabase;   
    /** @test */
    public function create_bank_test()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/bank/create',$this->data());
        $response->assertOk();
        $this->assertCount(1,Bank::all());
    }

    /** @test */
    public function bank_title_cannot_be_null()
    {
        $response = $this->post('/bank/create',array_merge($this->data(),['title' => '']));
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function bank_address_cannot_be_null()
    {
        $response = $this->post('/bank/create',array_merge($this->data(),['address' => '']));
        $response->assertSessionHasErrors('address');
    }

    private function data()
    {
        return [
            'title' => 'Bank 1',
            'address' => 'New Address',
        ];
    }
}
