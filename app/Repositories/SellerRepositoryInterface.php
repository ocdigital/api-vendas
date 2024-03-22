<?php

namespace App\Repositories;

interface SellerRepositoryInterface
{
    public function create(array $data);

    public function list();
}
