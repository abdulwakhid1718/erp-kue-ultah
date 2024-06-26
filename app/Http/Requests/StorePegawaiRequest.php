<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePegawaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tanggal_masuk' => 'required|date',
            'devisi_id' => 'required|exists:devisis,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'gaji_pokok' => 'required|numeric',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:pegawais,username',
            'password' => 'required|string|min:8',
        ];
    }
}
