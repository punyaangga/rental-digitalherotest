<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MasterProductRequest;
use App\Services\GlobalData;
use App\Models\Admin\MasterProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class MasterProductController extends Controller
{
    private $globalData;
    public function __construct()
    {
        $this->globalData = new GlobalData();
    }

    public function index(Request $request)
    {
        $getProduct = $this->globalData->dataProduct->getProduct();
        $data = [
            'masterProduct' => $getProduct
        ];
        return $this->globalData->datatableService->render(
            $request,
            $data['masterProduct'],
            'masterProduct',
            'null',
            'masterProduct.edit',
            'null',
            'pageAdmin.masterProduct.index'
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $getCategory = $this->globalData->dataCategory->getCategory();

        $data = [
            'categoryProduct' => $getCategory,

        ];
        return view('pageAdmin.masterProduct.create', compact('data'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $data= $request->all();

            if ($request->hasFile('ms_product_image')) {
                $ms_product_image = $request->file('ms_product_image');
                $imageName = time() . '.' . $ms_product_image->getClientOriginalExtension();
                $ms_product_image->move('foto_produk/', $imageName);
                $data['ms_product_image'] = 'foto_produk/' . $imageName;
            } else {
                $data['ms_product_image'] = null;
            }

            // Simpan data ke database
            MasterProduct::create($data);
            Alert::success('Success', 'Data Berhasil Ditambahkan');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Error', 'Terjadi Kesalahan Hubungi Admin'.$e->getMessage());
            return redirect()->back();
        }


        // try{
        //     $ms_product_image = $request->file('ms_product_image');
        //     $ms_product_name = $request->ms_product_name;
        //     $id_category_product = $request->id_category_product;
        //     $ms_product_wide = $request->ms_product_wide;
        //     $ms_product_grams = $request->ms_product_grams;
        //     $ms_product_number_yarn = $request->ms_product_number_yarn;
        //     $ms_product_status = $request->ms_product_status;
        //     $ms_product_description = $request->ms_product_description;
        //     $ms_product_meta_description = $request->ms_product_meta_description;
        //     $ms_product_meta_keyword = $request->ms_product_meta_keyword;

        //     if ($ms_product_image) {
        //         $imageName = time() . '.' . $ms_product_image->getClientOriginalExtension();
        //         $ms_product_image->move('foto_kain/', $imageName);
        //         $imagePath = 'foto_kain/'.$imageName;
        //     } else {
        //         $imagePath = null;
        //     }

        //     MasterProduct::create([
        //         'ms_product_name' => $ms_product_name,
        //         'id_category_product' => $id_category_product,
        //         'ms_product_wide' => $ms_product_wide,
        //         'ms_product_grams' => $ms_product_grams,
        //         'ms_product_number_yarn' => $ms_product_number_yarn,
        //         'ms_product_status' => $ms_product_status,
        //         'ms_product_description' => $ms_product_description,
        //         'ms_product_image' => $imagePath,
        //         'ms_product_meta_description' => $ms_product_meta_description,
        //         'ms_product_meta_keyword' => $ms_product_meta_keyword
        //     ]);
        //     Alert::success('Success', 'Data Berhasil Ditambahkan');
        //     return redirect()->back();
        // }catch(\Exception $e){
        //     Alert::error('Error', 'Terjadi Kesalahan Hubungi Admin');
        //     return redirect()->back();
        // }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $listCategory = $this->categoryProduct->getAllCategory();
            $product = MasterProduct::leftJoin('category_products', 'master_products.id_category_product', '=', 'category_products.id')
            ->select('master_products.*', 'category_products.id as cp_id','category_products.cp_name')
            ->findOrFail($id);
            $data = [
                'listCategory' => $listCategory,
                'detailProduct' => $product
            ];

            return view('pageAdmin.masterProduct.show', compact('data'));
        }catch(\Exception $e){
            Alert::error('Error', 'Data Tidak Ditemukan');
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MasterProductRequest $request, string $id)
    {

        try{
            $checkData = MasterProduct::findOrFail($id);
            $ms_product_image = $request->file('ms_product_image') ? $request->file('ms_product_image') : $checkData['ms_product_image'];
            $ms_product_name = $request->ms_product_name;
            $id_category_product = $request->id_category_product;
            $ms_product_wide = $request->ms_product_wide;
            $ms_product_grams = $request->ms_product_grams;
            $ms_product_number_yarn = $request->ms_product_number_yarn;
            $ms_product_status = $request->ms_product_status;
            $ms_product_description = $request->ms_product_description;
            $ms_product_meta_description = $request->ms_product_meta_description;
            $ms_product_meta_keyword = $request->ms_product_meta_keyword;

            if ($ms_product_image != $checkData['ms_product_image']) {
                File::delete(public_path($checkData->ms_product_image));
                $imageName = time() . '.' . $ms_product_image->getClientOriginalExtension();
                $ms_product_image->move('foto_kain/', $imageName);
                $imagePath = 'foto_kain/'.$imageName;
            } else {
                $imagePath = $checkData['ms_product_image'];
            }
            MasterProduct::where('id', $id)->update([
                'ms_product_name' => $ms_product_name,
                'id_category_product' => $id_category_product,
                'ms_product_wide' => $ms_product_wide,
                'ms_product_grams' => $ms_product_grams,
                'ms_product_number_yarn' => $ms_product_number_yarn,
                'ms_product_status' => $ms_product_status,
                'ms_product_description' => $ms_product_description,
                'ms_product_image' => $imagePath,
                'ms_product_meta_description' => $ms_product_meta_description,
                'ms_product_meta_keyword' => $ms_product_meta_keyword
            ]);
            Alert::success('Success', 'Data Berhasil Diubah');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Error', 'Terjadi Kesalahan Hubungi Admin');
            return redirect()->back();
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $data = MasterProduct::findOrFail($id);
            $data->delete();
            Alert::success('Success', 'Data Berhasil Dihapus');
            return redirect()->back();
        }catch(\Exception $e){
            Alert::error('Error', 'Terjadi Kesalahan Hubungi Admin');
            return redirect()->back();
        }
    }
}
