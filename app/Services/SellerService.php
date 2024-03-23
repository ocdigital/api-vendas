<?php

namespace App\Services;

use App\Repositories\SellerRepositoryInterface;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Collection;

class SellerService
{
    private SellerRepositoryInterface $sellerRepository;

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }

    public function create(array $data): Seller
    {
        return $this->sellerRepository->create($data);
    }

    public function list(): Collection
    {
        return $this->sellerRepository->list();
    }
}
