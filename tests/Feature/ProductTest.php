<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_index_can_be_accessed(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_product_can_be_created(): void
    {
        $response = $this->post('/products', [
            'name' => 'Laptop',
            'description' => 'Laptop untuk testing',
            'price' => 10000000,
            'stock' => 5,
        ]);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'name' => 'Laptop',
            'stock' => 5,
        ]);
    }

    public function test_product_can_be_updated(): void
    {
        $product = Product::create([
            'name' => 'Laptop',
            'description' => 'Laptop lama',
            'price' => 10000000,
            'stock' => 5,
        ]);

        $response = $this->put("/products/{$product->id}", [
            'name' => 'Laptop Baru',
            'description' => 'Laptop terbaru',
            'price' => 12000000,
            'stock' => 10,
        ]);

        $response->assertRedirect('/products');

        $this->assertDatabaseHas('products', [
            'name' => 'Laptop Baru',
            'stock' => 10,
        ]);
    }

    public function test_product_can_be_deleted(): void
    {
        $product = Product::create([
            'name' => 'Laptop',
            'description' => 'Laptop testing',
            'price' => 10000000,
            'stock' => 5,
        ]);

        $response = $this->delete("/products/{$product->id}");

        $response->assertRedirect('/products');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
