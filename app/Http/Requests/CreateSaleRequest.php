<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     * validar se o seller exitente
     */
    public function rules(): array
    {
        return [
            'seller_id' => 'required|exists:sellers,id',
            'sale_value' => 'required|numeric|min:0',
            'commission' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'seller_id.exists' => 'Vendedor não encontrado',
            'sale_value.required' => 'O campo valor da venda é obrigatório',
            'commission.required' => 'O campo comissão é obrigatório',
        ];
    }
}
