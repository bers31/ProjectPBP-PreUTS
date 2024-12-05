<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMatKulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role === 'dosen' && Auth::user()->dosen->kaprodi;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'kode_mk' => 'required|string', // If it's an update, skip unique validation
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|int|min:1', // Ensure semester is a positive integer
            'sks' => 'required|int|min:1', // Ensure SKS is a positive integer
            'kurikulum' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            'sifat' => 'required|string|in:wajib,pilihan',
        ];

        // For the store case, ensure 'kode_mk' is unique
        if ($this->isMethod('post')) {  // POST request (create)
            $rules['kode_mk'] = 'required|string|unique:mata_kuliah';
        }

        return $rules;
    }

}
