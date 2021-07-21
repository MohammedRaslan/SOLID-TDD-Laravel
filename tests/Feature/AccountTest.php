<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function calculate_total_for_regular_account()
    {   $this->withoutExceptionHandling();
        $response = $this->post('account/regular/calculate',$this->data());
        $response->assertJson([
            'total' => 40,
        ]);
    }

    /** @test */
    public function calculate_total_for_saving_account()
    {   $this->withoutExceptionHandling();
        $response = $this->post('account/saving/calculate',$this->data());
        $response->assertJson([
            'total' => 100,
        ]);
    }

    private function data(){
        return ['balance' => 200];
    }
}
