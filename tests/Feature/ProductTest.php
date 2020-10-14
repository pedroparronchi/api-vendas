<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{

    /**
     * Create product
     *
     * @return void
     */
    public function testCreateProduct()
    {
        $data = [
            'name' => '',
            'description' => '',
            'value' => '',
            'quantity' => '',
            'image' => '',
            'supplier_id' => ''
        ];

        $response = $this->postJson('/api/products', $data);
        $response->assertStatus(201);
    }
}
