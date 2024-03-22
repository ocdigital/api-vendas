<?php

namespace Tests\Feature\API;

use App\Models\Seller;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * Criar um vendedor
 */
it('can create a seller', function () {
    $seller = Seller::factory()->make()->toArray();

    $response = $this->postJson('api/seller', $seller);

    $response->assertStatus(201);
    $this->assertDatabaseHas('sellers', $seller);
});

/**
 * Tentar criar um vendedor sem nome
 */
it('requires_name_to_create_seller', function () {
    $seller = Seller::factory()->make(['name' => null])->toArray();

    $response = $this->postJson('api/seller', $seller);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors('name');
});

/**
 * Tentar criar um vendedor com email duplicado
 */
it('requires_unique_email_to_create_seller', function () {
    $seller = Seller::factory()->create();

    $newSeller = Seller::factory()->make(['email' => $seller->email])->toArray();

    $response = $this->postJson('api/seller', $newSeller);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors('email');
});

/**
 * Listar vendedores
 */
it('can_list_sellers', function () {
    $sellers = Seller::factory()->count(3)->create();

    $response = $this->getJson('api/seller');

    $response->assertStatus(200);
    $response->assertJsonCount(3);
});
