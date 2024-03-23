<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ao criar vendodeor devera retornar id,nome,email
 * Ao lista devera retornar id,nome,email e comissao
 * */
class SellerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if ($request->route()->getActionMethod() === 'store') {
            return [
                'id' => $this->id ?? null,
                'nome' => $this->name ?? null,
                'email' => $this->email ?? null,
            ];
        }

        return [
            'id' => $this->id ?? null,
            'nome' => $this->name ?? null,
            'email' => $this->email ?? null,
            'comissao' => $this->commission() ?? null,
        ];
    }
}
