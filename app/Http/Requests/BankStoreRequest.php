<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "bankName" => "required",
            "holderDni" => "required",
            "holderName" => "required",
            "type" => "required",
        ];
    }

    public function messages()
    {
        return [
            "bankName.required" => "Nombre del banco es requerido",
            "holderDni.required" => "Cédula del titular es requerida",
            "holderName.required" => "Nombre del titular es requerido",
            "type.required" => "Tipo de cuenta es requerida",
        ];
    }

}
