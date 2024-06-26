<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBahanBakuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_bahan_baku' => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:255',  // Nullable karena ada default value
            'stok' => 'nullable|integer|min:0',  // Pastikan stok adalah integer dan minimal 0
            'satuan' => 'required|string|max:255',
            'foto_bahan_baku' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
    }
}
