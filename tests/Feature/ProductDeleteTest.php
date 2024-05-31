<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductDeleteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_delete_product(): void
    {
        $product = Product::factory()->create();

        $response = $this->delete('/api/products/'.$product->getKey());

        $response->assertStatus(204);
    }
}
