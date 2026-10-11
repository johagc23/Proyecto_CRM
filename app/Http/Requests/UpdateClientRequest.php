<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_empresa' => 'required|string|max:255',
            'contacto_principal' => 'required|string|max:255',
            'telefono_whatsapp' => 'required|string|max:20',
            'zona_geografica' => 'required|in:Oeste,Este,Cabudare,Centro,Zona Industrial',
            'origin_id' => 'required|exists:origins,id',
        ];
    }
}
