<?php

namespace App\Repositories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;

interface SellerRepositoryInterface
{
    public function create(array $data): Seller;

    public function list(): Collection;
}
