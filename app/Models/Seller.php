<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seller extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = ['name', 'email'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    //retornar a soma de commissios deste vendendor da tabela de vendas
    public function commission()
    {
        return $this->hasMany(Sale::class)->sum('commission');
    }
}
