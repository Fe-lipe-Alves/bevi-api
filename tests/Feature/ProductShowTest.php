<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductShowTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $product = Product::factory()->create();

        $response = $this->getJson('/api/products/'.$product->getKey());

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'description',
                'price',
                'status',
                'stock_quantity',
                'created_at',
                'updated_at',
            ],
            "links" => [
                'self',
            ]
        ]);
        $this->assertEquals($product->getKey(), $response->json('data.id'));
    }
}
