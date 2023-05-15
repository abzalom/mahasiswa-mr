<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJabatanRequest extends FormRequest
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
            'nama' => 'required',
            'jabatan' => 'required',
            'nip' => 'numeric|unique:jabatans,nip,' . $this->id,
        ];
    }

    function messages()
    {
        return [
            'nama.required' => 'Nama tidak boleh kosong!',
            'jabatan.required' => 'Jabatan tidak boleh kosong!',
            'nip.unique' => 'NIP sudah ada!',
            'nip.numeric' => 'NIP salah!',
        ];
    }
}
