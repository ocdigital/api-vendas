<?php

namespace App\Repositories;

use App\Models\Sale;
use Illuminate\Support\Collection;

interface SaleRepositoryInterface
{
    public function create(array $data): Sale;

    public function getAllBySellerId(string $sellerId): Collection;
}
