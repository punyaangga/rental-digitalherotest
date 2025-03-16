<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MasterProductRequest extends FormRequest
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
            'ms_product_name' => ['required', 'string', 'max:255'],
            'ms_product_description' => ['string'],
            'id_category_product' => ['required', 'string'],
            'ms_product_image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'ms_product_status' => ['required', 'boolean']
        ];
    }
    public function messages()
    {
        return [
            'ms_product_name.required' => 'Nama Kain tidak boleh kosong',
            'ms_product_name.string' => 'Nama kain harus berupa huruf',
            'ms_product_name.max' => 'Nama kain maksimal 255 karakter',
            'ms_product_description.string' => 'Deskripsi kain harus berupa huruf',
            'id_category_product.required' => 'Kategori kain tidak boleh kosong',
            'id_category_product.integer' => 'Terjadi kesalahan pada nilai kategori',
            'ms_product_status.required' => 'Status kain tidak boleh kosong',
            'ms_product_status.boolean' => 'Status kain harus berupa angka',
            'ms_product_image.image' => 'File harus berupa gambar, dengan format jpeg, png, jpg, gif, atau svg',
            'ms_product_image.max' => 'Ukuran gambar maksimal 2MB'

        ];
    }
}
