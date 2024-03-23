<?php


namespace App\Repositories;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;

class EloquentSellerRepository implements SellerRepositoryInterface
{
    public function create(array $data): Seller
    {
        return Seller::create($data);
    }

    public function list(): Collection
    {
        return Seller::all();
    }
}
