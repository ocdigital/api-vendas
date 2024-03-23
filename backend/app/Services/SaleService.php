<?php

namespace App\Services;

use App\Models\Sale;
use App\Repositories\SaleRepositoryInterface;
use Illuminate\Support\Collection;

class SaleService
{
    protected $saleRepository;

    public function __construct(SaleRepositoryInterface $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    public function create(array $data): Sale
    {

        $commission = $data['sale_value'] * 0.085;
        $data['commission'] = $commission;

        return $this->saleRepository->create($data);
    }

    public function getAllBySellerId(string $sellerId): Collection
    {
        return $this->saleRepository->getAllBySellerId($sellerId);
    }
}
