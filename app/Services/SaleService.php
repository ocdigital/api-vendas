<?php

namespace App\Services;

use App\Repositories\SaleRepositoryInterface;

class SaleService
{
    protected $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function create(array $data)
    {
        $commission = $data['sale_value'] * 0.085;
        $data['commission'] = $commission;

        return $this->saleRepository->create($data);
    }

    public function getAllBySellerId(string $sellerId)
    {
        return $this->saleRepository->getAllBySellerId($sellerId);
    }
}
