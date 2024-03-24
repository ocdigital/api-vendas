<?php

namespace App\Repositories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class EloquentSellerRepository implements SellerRepositoryInterface
{
    public function create(array $data): Seller
    {
        return Seller::create($data);
    }

    public function list(): Collection
    {
        return Cache::remember('sellers', 60, function () {
            return Seller::all();
        });
    }
}
