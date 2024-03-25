<?php

use App\Models\Sale;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;

uses(RefreshDatabase::class);

/**
 * Criar uma venda
 */
it('can_create_sale', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $seller = Seller::factory()->create();
    $saleData = [
        'seller_id' => $seller->id,
        'sale_value' => '1000',
    ];
    $response = $this->postJson('api/sale', $saleData);
    $response->assertStatus(201);
    $commission = $saleData['sale_value'] * 0.085;
    $saleData['commission'] = $commission;
    $this->assertDatabaseHas('sales', $saleData);
});

/**
 * Listar vendas de um vendedor
 */
it('can_list_sales_by_seller_id', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $sellerId = Seller::factory()->create()->id;
    $sales = Sale::factory()->count(3)->create(['seller_id' => $sellerId]);
    $response = $this->getJson("api/sale/{$sellerId}");
    $response->assertStatus(200);
    $response->assertJsonCount(3, 'data');
});

/**
 * Tentar criar uma venda sem valor da venda
 */
it('requires_sale_value_to_create_sale', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $sale = Sale::factory()->make(['sale_value' => null])->toArray();
    $response = $this->postJson('api/sale', $sale);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors('sale_value');
});

/**
 * Tentar criar uma venda com vendedor inexistente
 */
it('requires_an_existing_seller_to_create', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $nonExistentSellerId = 'non-existent-id';
    $sale = Sale::factory()->make(['seller_id' => $nonExistentSellerId])->toArray();
    $response = $this->postJson('api/sale', $sale);
    $response->assertStatus(422);
    $response->assertJsonValidationErrors('seller_id');
});

/**
 * Listar vendas de um vendedor
 */
it('can_list_sales', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $seller = Seller::factory()->create();
    $sales = Sale::factory()->count(3)->create(['seller_id' => $seller->id]);
    $response = $this->getJson('api/sale/'.$seller->id);
    $response->assertStatus(200);
    $response->assertJsonCount(3, 'data');
});
