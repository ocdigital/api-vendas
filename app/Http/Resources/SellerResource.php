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
        // Retorna id, nome e email ao criar vendedor
        if ($request->route()->getActionMethod() === 'store') {
            return [
                'id' => $this->id,
                'nome' => $this->name,
                'email' => $this->email,
            ];
        }

        // Retorna id, nome, email e comissao ao listar vendedores
        return [
            'id' => $this->id,
            'nome' => $this->name,
            'email' => $this->email,
            'comissao' => $this->commission(),
        ];
    }
}
