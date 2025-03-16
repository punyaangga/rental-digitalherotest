<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StockProductRequest extends FormRequest
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
            'id_product' => ['required', 'string'],
            'id_branch' => ['required', 'string'],
            'id_color' => ['nullable', 'string'],
            'id_product' => ['required', 'string'],
            'sp_barcode' => ['required', 'string','unique:stock_products,sp_barcode'],
            'sp_qty' => ['required', 'numeric'],
            'sp_type' => ['nullable', 'string'],
        ];
    }
    public function messages(): array
    {
        return [
            'id_product.required' => 'Nama product wajib di isi',
            'id_branch.required' => 'Nama cabang wajib di isi',
            'id_product.required' => 'Product wajib di isi',
            'sp_barcode.required' => 'Barcode wajib di isi',
            'sp_barcode.unique' => 'Barcode sudah ada, gunakan barcode yg lain',
            'sp_qty.required' => 'Jumlah Barang Wajib di isi',
        ];
    }
}
