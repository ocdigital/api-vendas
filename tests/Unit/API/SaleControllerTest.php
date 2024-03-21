<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Seller;
use App\Models\Sale;
use Tests\TestCase;

uses(TestCase::class);

uses(RefreshDatabase::class);

/**
 * Criar uma venda
 */
test('can_create_sale', function () {
    $seller = Seller::factory()->create();

    $sale = Sale::factory()->create([
        'seller_id' => $seller->id,
    ]);

    $this->assertNotNull($sale);
    $this->assertEquals($seller->id, $sale->seller_id);

});

/**
 * Listar vendas de um vendedor
 */
test('can_list_sales_seller', function () {
    $seller = Seller::factory()->create();
    $sales = Sale::factory()->count(3)->create([
        'seller_id' => $seller->id,
    ]);

    $count = Sale::where('seller_id', $seller->id)->count();
    $this->assertEquals(3, $count);
});
