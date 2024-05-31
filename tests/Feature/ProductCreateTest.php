<?php

namespace Tests\Feature;

use App\Enums\StatusEnum;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCreateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_create_product(): void
    {
        $data = [
            'name' => $this->faker()->colorName(),
            'description' => $this->faker()->text(),
            'price' => 16.90,
            'status' => StatusEnum::MISSING->value,
            'stock_quantity' => 10,
        ];

        $response = $this->postJson('/api/products', $data);
        $response->assertStatus(201);
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
        $product = Product::find($response->json('data.id'));
        $this->assertEquals($data['price'], $product->price);
    }
}
