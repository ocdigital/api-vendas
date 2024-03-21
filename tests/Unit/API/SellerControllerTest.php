<?php

use App\Models\Seller;

test('can_create_seller', function () {
    $seller = Seller::factory()->create();
    $this->assertDatabaseHas('sellers', $seller->toArray());
});

test('can_list_sellers', function () {
    $sellers = Seller::factory()->count(3)->create();
    $this->assertCount(3, Seller::all());
});



