<?php

namespace Tests\Unit\API;

use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class);

uses(RefreshDatabase::class);

/**
 * Criar um vendedor
 */
test('can_create_seller', function () {
    $seller = Seller::factory()->create();

    $this->assertDatabaseHas('sellers', [
        'name' => $seller->name,
        'email' => $seller->email,
        'id' => $seller->id,
        'updated_at' => $seller->updated_at,
        'created_at' => $seller->created_at,
    ]);
});

/**
 * Tentar criar um vendedor sem nome
 */
test('requires_a_name_to_create_seller', function () {
    $sellerData = Seller::factory()->make(['name' => null])->toArray();
    $this->expectException(\Illuminate\Database\QueryException::class);
    Seller::create($sellerData);
});

/**
 * Tentar criar um vendedor com email ja existente
 */
test('requires_a_unique_email_to_create_seller', function () {
    $existingVendor = Seller::factory()->create();
    $duplicateEmail = $existingVendor->email;
    $vendorData = Seller::factory()->make(['email' => $duplicateEmail])->toArray();
    $this->expectException(\Illuminate\Database\QueryException::class);
    Seller::create($vendorData);
});

/**
 * Listar vendedores
 */
test('can_list_sellers', function () {
    Seller::factory()->count(3)->create();
    $count = Seller::count();
    $this->assertEquals(3, $count);
});
