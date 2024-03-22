<?php

namespace App\Services;

use App\Repositories\SellerRepositoryInterface;

class SellerService
{
    private SellerRepositoryInterface $sellerRepository;

    public function __construct(SellerRepositoryInterface $sellerRepository)
    {
        $this->sellerRepository = $sellerRepository;
    }

    public function create(array $data)
    {
        return $this->sellerRepository->create($data);
    }

    public function list()
    {
        return $this->sellerRepository->list();
    }
}
