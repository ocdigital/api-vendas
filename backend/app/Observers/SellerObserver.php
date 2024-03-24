<?php

namespace App\Observers;

use App\Models\Seller;
use Laravel\Scout\Searchable;

class SellerObserver
{
    use Searchable;

    public function created(Seller $seller): void
    {
        $seller->searchable();
    }
}
