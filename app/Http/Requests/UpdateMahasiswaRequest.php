<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMahasiswaRequest extends FormRequest
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
            //
            'nim' => 'required|string|unique:mahasiswa|size:14',
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@students\.undip\.ac\.id$/',
            'kode_prodi' => 'required|string|max:255|exists:prodi,kode_prodi',
            'doswal' => 'required|exists:dosen,nidn', 
        ];
    }

    public function messages(): array
    {
        return [
            'nim.required' => 'NIM wajib diisi',
            'nim.size' => 'NIM harus 14 karakter',
            'nim.unique' => 'NIM sudah terdaftar',
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.regex' => 'Email harus menggunakan domain students.undip.ac.id',
            'kode_prodi.required' => 'Program studi wajib dipilih',
            'kode_prodi.exists' => 'Program studi tidak valid',
            'doswal.required' => 'Dosen wali wajib dipilih',
            'doswal.exists' => 'Dosen wali tidak valid',
        ];
    }
}
