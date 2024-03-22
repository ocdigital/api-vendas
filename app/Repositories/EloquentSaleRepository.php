<?php

namespace App\Repositories;

use App\Models\Sale;
use Illuminate\Support\Collection;

class EloquentSaleRepository implements SaleRepositoryInterface
{
    public function create(array $data): Sale
    {
        return Sale::create($data);
    }

    public function getAllBySellerId(string $sellerId): Collection
    {
        return Sale::where('seller_id', $sellerId)->get();
    }
}
