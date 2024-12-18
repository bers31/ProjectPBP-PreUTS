<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateDosenRequest extends FormRequest
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
            'nidn' => [
                'required',
                'string',
                'size:12',
                Rule::unique('dosen', 'nidn')->ignore($this->route('dosen')->nidn, 'nidn'),
            ],
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@lecturers\.undip\.ac\.id$/',
        ];
    }
}
