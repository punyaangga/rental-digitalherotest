<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryProductRequest extends FormRequest
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
            'cp_name' => ['required', 'string', 'max:255'],
            'cp_description' => ['required', 'string'],
        ];
        
    }
    public function messages(): array
    {
        return [
            'cp_name.required' => 'Nama Kategori Produk tidak boleh kosong',
            'cp_name.string' => 'Nama Kategori Produk harus berupa huruf',
            'cp_name.max' => 'Nama Kategori Produk maksimal 255 karakter',
            'cp_description.required' => 'Deskripsi Kategori Produk tidak boleh kosong',
            'cp_description.string' => 'Deskripsi Kategori Produk harus berupa huruf',
        ];
    }
}
