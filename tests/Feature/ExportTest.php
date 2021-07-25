<?php

namespace Tests\Feature;

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
        $response = $this->post('export/php',array_merge($this->data(),['extension' => 'PHP']));
        $response->assertJson([
            'message' => 'PHP File Exported',
        ]);
    }

    /** @test */
    public function export_data_as_json_file()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('export/json',array_merge($this->data(),['extension' => 'Json']));
        $response->assertJson([
            'message' => 'Json File Exported',
        ]);
    }


    protected function data()
    {
        return [
            'title' => 'New File To Export',
            'name' => 'Raslan',
            'extension' => ''
        ];
    }

    
}
