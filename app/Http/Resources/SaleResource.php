<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->seller->name,
            'email' => $this->seller->email,
            'comissao' => $this->seller->commission(),
            'valor_da_venda' => $this->sale_value,
            'data_da_venda' => $this->created_at->format('d/m/Y H:i:s'),
        ];
    }
}
