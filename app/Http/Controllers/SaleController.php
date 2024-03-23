<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSaleRequest;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Services\SaleService;
use Illuminate\Http\Request;


class SaleController extends Controller
{
    protected $saleService;

    public function __construct(SaleService $saleService)
    {
        $this->saleService = $saleService;
    }

    public function store(CreateSaleRequest $request)
    {
        $data = $request->validated();

        $sale = $this->saleService->create($data);

        return new SaleResource($sale);
    }

    public function getAllBySellerId(string $sellerId)
    {
        $sales = $this->saleService->getAllBySellerId($sellerId);

        return SaleResource::collection($sales);
    }
}
