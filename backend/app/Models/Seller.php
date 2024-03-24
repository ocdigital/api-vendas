<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Seller extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    use Searchable;

    protected $fillable = ['name', 'email'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function commission()
    {
        return $this->hasMany(Sale::class)->sum('commission');
    }
}
