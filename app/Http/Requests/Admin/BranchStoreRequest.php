<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BranchStoreRequest extends FormRequest
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
           'bs_name' => ['required', 'string', 'max:255'],
           'bs_address' => ['required','string']
       
        ];
    }
    public function messages()
    {
        return [
            'bs_name.required' => 'Nama cabang wajib di isi ',
            'bs_name.string' => 'Nama cabang harus berupa huruf',
            'bs_name.max' => 'Nama cabang maksimal 255 karakter',
            'bs_address.string' => 'Alamat cabang harus berupa huruf',
            'bs_address.required' => 'Alamat cabang wajib di isi',
            'bs_phone_number.numeric' => 'Nomor telp cabang harus berupa angka'
        ];
    }
}
