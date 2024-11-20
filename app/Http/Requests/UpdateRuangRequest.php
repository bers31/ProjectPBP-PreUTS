<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateRuangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role === 'admin';
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {
        return [
            'kode_ruang' => [
                'required',
                'string',
                Rule::unique('ruang', 'kode_ruang')->ignore($this->route('ruang')->kode_ruang, 'kode_ruang'),
            ],
            'kode_fakultas' => 'required|string|exists:fakultas,kode_fakultas', 
            'kapasitas' => 'required|integer|min:1'
        ];
    }
    
}