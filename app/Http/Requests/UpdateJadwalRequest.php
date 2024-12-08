<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateJadwalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && optional(Auth::user()->dosen)->kaprodi;
    }

    public function rules(): array
    {
        return [
            'kode_mk' => 'required|string|max:30',
            'kode_kelas' => [
                'required',
                'string',
                'max:5',
                Rule::unique('jadwal')->where(function ($query) {
                    return $query->where('kode_mk', $this->kode_mk)
                                 ->where('hari', $this->hari)
                                 ->where('ruang', $this->ruang);
                })->ignore($this->jadwal),
            ],
            'hari' => 'required|string|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'ruang' => 'required|string|exists:ruang,kode_ruang',
            'jam_mulai' => 'required|date_format:H:i|before:jam_selesai',  // Ensure it's before jam_selesai
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',  // Ensure it's after jam_mulai
            'kuota' => 'required|integer|min:1',
            'kode_tahun' => 'required|string',
            'dosen_pengampu' => [
                'required',
                'json',
                function ($attribute, $value, $fail) {
                    $decoded = json_decode($value, true);
                    if (!is_array($decoded) || count($decoded) < 1) {
                        $fail('Dosen Pengampu Harus dipilih!');
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
            'dosen_pengampu.*.exists' => 'One or more Dosen Pengampu are invalid.',
        ];
    }
}
