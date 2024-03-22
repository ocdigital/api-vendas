<?php

use App\Models\Sale;
use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class);

uses(RefreshDatabase::class);

/**
 * Criar uma venda
 */
it('can_create_sale', function () {
    $seller = Seller::factory()->create();

    $sale = Sale::factory()->create([
        'seller_id' => $seller->id,
    ]);

    $this->assertNotNull($sale);
    $this->assertEquals($seller->id, $sale->seller_id);

});

/**
 * Tentar criar uma venda com vendedor inexistente
 */
it('requires_an_existing_seller_to_create_a_sale', function () {
    $nonExistentSellerId = 'non-existent-id';

    $saleData = Sale::factory()->make(['seller_id' => $nonExistentSellerId])->toArray();

    $this->expectException(\Illuminate\Database\QueryException::class);
    Sale::create($saleData);
});

/**
 * Tentar criar uma venda sem valor da venda ou comissão
 */
it('requires_sale_value_and_commission_to_create_sale', function () {
    $saleData = Sale::factory()->make([
        'sale_value' => null,
        'commission' => null,
    ])->toArray();

    $this->expectException(\Illuminate\Database\QueryException::class);
    Sale::create($saleData);
});

/**
 * Listar vendas de um vendedor
 */
it('can_list_sales_seller', function () {
    $seller = Seller::factory()->create();
    $sales = Sale::factory()->count(3)->create([
        'seller_id' => $seller->id,
    ]);

    $count = Sale::where('seller_id', $seller->id)->count();
    $this->assertEquals(3, $count);
});
