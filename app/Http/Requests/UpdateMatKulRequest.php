<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateMatKulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user() && Auth::user()->role === 'dosen';
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode_mk' => 'required|string',
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|int',
            'sks' => 'required|int',
            'kurikulum' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            'sifat' => 'required|string|in:wajib,pilihan'
        ];
    }

    public function messages(): array
    {
        return [
            'kode_mk.required' => "Kode Matkul harus diisi",
            'nama_mk.required' => "Nama Matkul harus diisi",
            'semester.required' => "Semester Harus Diisi",
            'sks.required' => "SKS harus diisi",
            'kurikulum.required' => "Kurikulum harus diisi",
            'kode_prodi.required' => "Kode Prodi harus diisi",
            'kode_prodi.exists' => "Kode Prodi tidak valid",
            'sifat.required' => "Sifat harus diisi"
        ];
    }
}
