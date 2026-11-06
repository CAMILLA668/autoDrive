<?php
namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marca_id' => ['required','exists:marcas,id'],
            'modelo'   => ['required', 'string', 'min:2'],
            'ano'      => ['required', 'integer', 'min:1900'],
            'preco'    => ['required', 'numeric', 'min:1000'],
            'status'   => ['required', 'string'],
        ];
    }
}