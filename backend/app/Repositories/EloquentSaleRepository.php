<?php

namespace App\Repositories;

use App\Models\Sale;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class EloquentSaleRepository implements SaleRepositoryInterface
{
    public function create(array $data): Sale
    {
        return Sale::create($data);
    }

    public function getAllBySellerId(string $sellerId): Collection
    {
        return Cache::remember("sales.seller.$sellerId", 60, function () use ($sellerId) {
            return Sale::where('seller_id', $sellerId)->get();
        });
    }
}
