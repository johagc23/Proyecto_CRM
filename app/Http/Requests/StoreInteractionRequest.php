<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInteractionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'tipo_interaccion' => 'required|in:Llamada,Visita,WhatsApp',
            'observaciones' => 'required|string',
            'fecha_seguimiento' => 'required|date',
        ];
    }
}