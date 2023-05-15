<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'kode' => 'required|numeric|unique:banks,kode,' . $this->id,
            'nama' => 'required',
        ];
    }

    function messages()
    {
        return [
            'kode.required' => 'Kode bank tidak boleh kosong!',
            'kode.numeric' => 'Kode bank hanya boleh berupa angka!',
            'kode.unique' => 'Kode bank sudah ada, silahkan input yang lain!',
            'nama.required' => 'Kode bank tidak boleh kosong!',
        ];
    }
}
