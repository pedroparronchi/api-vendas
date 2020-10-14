<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * Test create
     *
     * @return void
     */
    public function testCreateCustomer()
    {
        $data = [
            'name' => 'Pedro Henrique Cliente', 
            'email' => 'pedro.henrique.p.l@hotmail.com', 
            'cpf' => '320.005.610-04'
        ];

        $response = $this->postJson('/api/customers', $data);
        $response->assertStatus(201);
    }
}
