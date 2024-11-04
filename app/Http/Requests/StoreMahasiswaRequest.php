<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMahasiswaRequest extends FormRequest
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
            'nim' => 'required|string|unique:mahasiswa|size:14',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@students\.undip\.ac\.id$/',
            'prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            // 'ipk' => 'required|decimal:0,4',
            // 'semester' => 'required|integer|min:1|max:14',
            // 'sks' => 'nullable|integer|min:0',
            'doswal' => 'required|exists:dosen,nidn', 
        ];
    }
}
