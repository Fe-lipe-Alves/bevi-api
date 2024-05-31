<?php

namespace Tests\Feature;

use App\Enums\StatusEnum;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductUpdateTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_put_update_product(): void
    {
        $product = Product::factory()->create();
        $data = [
            'name' => $this->faker()->colorName(),
            'description' => $this->faker()->text(),
            'price' => 16.90,
            'status' => StatusEnum::MISSING->value,
            'stock_quantity' => 10,
        ];

        $response = $this->putJson('/api/products/'.$product->getKey(), $data);
        $product->refresh();

        $response->assertStatus(200);
        $this->assertEquals($data['name'], $product->name);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['price'], $product->price);
        $this->assertEquals($data['status'], $product->status->value);
        $this->assertEquals($data['stock_quantity'], $product->stock_quantity);
    }

    public function test_patch_update_product(): void
    {
        $product = Product::factory()->create();
        $data = [
            'description' => $this->faker()->text(),
            'stock_quantity' => $this->faker()->randomDigit(),
        ];

        $response = $this->patchJson('/api/products/'.$product->getKey(), $data);
        $product->refresh();

        $response->assertStatus(200);
        $this->assertEquals($data['description'], $product->description);
        $this->assertEquals($data['stock_quantity'], $product->stock_quantity);
    }
}
