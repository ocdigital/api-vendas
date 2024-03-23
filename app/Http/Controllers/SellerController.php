<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSellerRequest;
use App\Services\SellerService;
use App\Http\Resources\SellerResource;

class SellerController extends Controller
{
    private SellerService $sellerService;

    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    public function index()
    {
        $sellers = $this->sellerService->list();

        return SellerResource::collection($sellers);

    }

    public function store(CreateSellerRequest $request)
    {

        $data = $request->validated();

        $seller = $this->sellerService->create($data);

        return new SellerResource($seller);
    }
}
