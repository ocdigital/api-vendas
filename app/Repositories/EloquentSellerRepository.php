<?php

namespace App\Repositories;

use App\Models\Seller;

class EloquentSellerRepository implements SellerRepositoryInterface
{
    public function create(array $data)
    {
        return Seller::create($data);
    }

    public function list()
    {
        return Seller::all();
    }
}
