<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Sale extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Searchable;

    protected $fillable = [
        'seller_id',
        'sale_value',
        'commission',
    ];

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
