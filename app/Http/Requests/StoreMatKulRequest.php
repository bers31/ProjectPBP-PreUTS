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
        return Auth::user() && Auth::user()->role === 'dosen' && Auth::user()->dosen->kaprodi;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // return [
        //     'nim' => 'required|string|unique:mahasiswa|size:14',
        //     'nama' => 'required|string|max:255',
        //     'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@students\.undip\.ac\.id$/',
        //     'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
        //     'doswal' => 'required|exists:dosen,nidn', 
        // ];
        return [
            'kode_mk' => 'required|string|unique:mata_kuliah',
            'nama_mk' => 'required|string|max:255',
            'semester' => 'required|int',
            'sks' => 'required|int',
            'kurikulum' => 'required|string|max:255',
            'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            'sifat' => 'required|string|in:wajib,pilihan'
        ];
    }
}
