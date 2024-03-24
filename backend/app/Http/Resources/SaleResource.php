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
            'nome' => optional($this->seller)->name,
            'email' => optional($this->seller)->email,
            'comissao' => $this->commission,
            'valor_da_venda' => $this->sale_value,
            'data_da_venda' => optional($this->created_at)->format('d/m/Y H:i:s'),
        ];
    }
}
