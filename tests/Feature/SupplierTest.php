<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SupplierTest extends TestCase
{
    /**
     * Test create
     *
     * @return void
     */
    public function testCreateCustomer()
    {
        $data = [
            'name' => 'Pedro Henrique Fornecedor', 
            'email' => 'pedro@cbmsolucoes.com.br', 
            'cpf' => '011.269.810-79'
        ];

        $response = $this->postJson('/api/customers', $data);
        $response->assertStatus(201);
    }
}
