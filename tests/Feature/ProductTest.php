<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_products_json()
    {
        Product::factory()->create(['name' => 'Test Product']);

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Test Product']);
    }

    public function test_a_product_can_be_stored_via_api()
    {
        $data = [
            'name' => 'API Product',
            'number_of_pieces' => 5,
            'price' => 50.00,
            'stock_quantity' => 10,
        ];

        $response = $this->postJson('/api/products', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('products', ['name' => 'API Product']);
    }

    public function test_api_can_show_specific_product()
    {
        $product = Product::factory()->create(['name' => 'Specific Product']);

        $response = $this->getJson("/api/products/{$product->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment(['name' => 'Specific Product']);
    }

    public function test_a_product_can_be_updated_via_api()
    {
        $product = Product::factory()->create(['name' => 'Old API Name']);
        $updatedData = [
            'name' => 'New API Name',
            'number_of_pieces' => 3,
            'price' => 12.50,
            'stock_quantity' => 5,
        ];

        $response = $this->putJson("/api/products/{$product->id}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('products', ['name' => 'New API Name']);
    }

    public function test_a_product_can_be_deleted_via_api()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/products/{$product->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}