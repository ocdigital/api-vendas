<?php

namespace App\Observers;

use App\Models\Sale;
use Laravel\Scout\Searchable;

class SaleObserver
{
    use Searchable;

    public function created(Sale $sale): void
    {
        $sale->searchable();
    }
}
