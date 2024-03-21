<?php

namespace Tests\Unit\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Seller;
use Tests\TestCase;

uses(TestCase::class);

uses(RefreshDatabase::class);

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

test('can_list_sellers', function () {
    Seller::factory()->count(3)->create();
    $count = Seller::count();
    $this->assertEquals(3, $count);
});



