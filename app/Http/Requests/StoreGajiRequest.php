<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGajiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pegawai_id' => 'required',
            'bulan' => 'required|string',
            'tahun' => 'required|date_format:Y',
            'total_lembur' => 'required|numeric|min:0',
            'total_upah_lembur' => 'required|numeric|min:0',
            'total_gaji' => 'required|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0|max:100',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'pegawai_id.required' => 'ID Pegawai wajib diisi.',
            'pegawai_id.exists' => 'ID Pegawai harus ada dalam tabel pegawai.',
            'lembur.required' => 'Lembur wajib diisi.',
            'lembur.numeric' => 'Lembur harus berupa angka.',
            'lembur.min' => 'Lembur harus minimal 0.',
            'tanggal_gaji_bulan.required' => 'Bulan Gaji wajib diisi.',
            'tanggal_gaji_bulan.date_format' => 'Bulan Gaji harus berupa bulan yang valid.',
            'tanggal_gaji_tahun.required' => 'Tahun Gaji wajib diisi.',
            'tanggal_gaji_tahun.date_format' => 'Tahun Gaji harus berupa tahun yang valid.',
            'total_gaji.required' => 'Total Gaji wajib diisi.',
            'total_gaji.numeric' => 'Total Gaji harus berupa angka.',
            'total_gaji.min' => 'Total Gaji harus minimal 0.',
            'potongan.numeric' => 'Potongan harus berupa angka.',
            'potongan.min' => 'Potongan harus minimal 0.',
            'potongan.max' => 'Potongan harus maksimal 100.',
        ];
    }
}
