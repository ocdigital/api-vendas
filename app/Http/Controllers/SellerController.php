<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSellerRequest;
use App\Services\SellerService;

class SellerController extends Controller
{
    private SellerService $sellerService;

    public function __construct(SellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    public function index()
    {
        return response()->json($this->sellerService->list());
    }

    public function store(CreateSellerRequest $request)
    {
        $data = $request->all();

        return response()->json($this->sellerService->create($data), 201);
    }
}
