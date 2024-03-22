<?php

use App\Models\Sale;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * Criar uma venda
 */
it('can_create_sale', function () {
    $sale = Sale::factory()->make()->toArray();

    $response = $this->postJson('api/sale', $sale);

    $response->assertStatus(201);
    $this->assertDatabaseHas('sales', $sale);
});

/**
 * Tentar criar uma venda sem valor da venda
 */
it('requires_sale_value_to_create_sale', function () {
    $sale = Sale::factory()->make(['sale_value' => null])->toArray();

    $response = $this->postJson('api/sale', $sale);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors('sale_value');
});

/**
 * Tentar criar uma venda sem comissão
 */
it('requires_commission_to_create_sale', function () {
    $sale = Sale::factory()->make(['commission' => null])->toArray();

    $response = $this->postJson('api/sale', $sale);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors('commission');
});

/**
 * Tentar criar uma venda com vendedor inexistente
 */
it('requires_an_existing_seller_to_create', function () {
    $nonExistentSellerId = 'non-existent-id';

    $sale = Sale::factory()->make(['seller_id' => $nonExistentSellerId])->toArray();

    $response = $this->postJson('api/sale', $sale);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors('seller_id');
});

/**
 * Listar vendas
 */
it('can_list_sales', function () {
    $sales = Sale::factory()->count(3)->create();

    $response = $this->getJson('api/sale');

    $response->assertStatus(200);
    $response->assertJsonCount(3);
});
