<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class StoreJadwalRequest extends FormRequest
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
        return [
            'kode_mk' => 'required|string|max:10',
            'kode_kelas' => 'required|string|max:5',
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'ruang' => 'required|string|exists:ruang,kode_ruang', // Adjust table and column names as necessary
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'kuota' => 'required|integer|min:1',
            'dosen_pengampu' => [
                'required',
                'json', // Validate that the input is a valid JSON string
                function ($attribute, $value, $fail) {
                    $decoded = json_decode($value, true);
                    if (!is_array($decoded) || count($decoded) < 1) {
                        $fail('The ' . $attribute . ' field must be a JSON array with at least one item.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'kode_mk.required' => 'Kode Mata Kuliah is required.',
            'kode_kelas.required' => 'Kode Kelas is required.',
            'hari.required' => 'Hari is required.',
            'ruang.required' => 'Ruang is required.',
            'jam_mulai.required' => 'Jam Mulai is required.',
            'jam_selesai.required' => 'Jam Selesai is required.',
            'kuota.required' => 'Kuota is required.',
            'dosen_pengampu.required' => 'At least one Dosen Pengampu is required.',
        ];
    }

}
