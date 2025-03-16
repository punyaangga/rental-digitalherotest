<!DOCTYPE html>
<html lang="en">
<head>
    @include('templateAdmin.seo')
    @include('templateAdmin.styleGlobalCss')
</head>
<body>
	<div class="main-wrapper">
		{{-- side bar  --}}@include('templateAdmin.sidebar'){{-- end sidebar --}}
		<div class="page-wrapper">
			{{-- header --}}@include('templateAdmin.header'){{-- end header --}}
			<div class="page-content">
                @include('templateAdmin.alertMessage')
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('masterProduct.index')}}">Data Kain</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Ubah Kain</h6>
                        <form method="POST" action="{{route('masterProduct.update',$data['detailProduct']['id'])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Produk</label>
                                        <input type="file" id="myDropify" name="ms_product_image"/>
                                    </div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal" style="float: right;">
                                        Lihat Gambar
                                    </button>
                                    {{-- modal gambar   --}}
                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="imageModalLabel">Gambar Kain</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    @if ($data['detailProduct'] != null)
                                                            <img src="{{asset($data['detailProduct']['ms_product_image'])}}" class="img-fluid"> 
                                                    @else
                                                        <h1>Gambar tidak ditemukan</h1>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Kain</label>
                                        <input type="text" class="form-control" placeholder="Nama Produk" name="ms_product_name" value="{{old('ms_product_name',$data['detailProduct']['ms_product_name'])}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Kain</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="id_category_product">
                                            <option value="{{ $data['detailProduct']['id_category_product'] }}">{{ $data['detailProduct']['cp_name'] }}</option>
                                            @foreach ($data['listCategory'] as $listCategory)
                                                <option value="{{ $listCategory['id'] }}">{{ $listCategory['cp_name'] }}</option>
                                            @endforeach                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Lebar Kain</label>
                                        <input type="number" class="form-control" placeholder="Masukan Lebar Produk" name="ms_product_wide" value="{{old('ms_product_wide',$data['detailProduct']['ms_product_wide'])}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gramasi</label>
                                        <input type="number" class="form-control" placeholder="Masukan gramasi produk" name="ms_product_grams" value="{{old('ms_product_grams',$data['detailProduct']['ms_product_grams'])}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Benang</label>
                                        <input type="number" class="form-control" placeholder="Masukan Lebar Produk" name="ms_product_number_yarn" value="{{old('ms_product_number_yarn',$data['detailProduct']['ms_product_number_yarn'])}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status Kain</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="ms_product_status">
                                            <option value="{{$data['detailProduct']['ms_product_status']}}">{{ $data['detailProduct']['ms_product_status'] == 1 ? 'Aktif' : 'Tidak' }}</option>
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Produk</label>
                                        <textarea class="form-control" name="ms_product_description">{{old('ms_product_description',$data['detailProduct']['ms_product_description'])}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 class="card-title">SEO Produk (Optional)</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="ms_product_meta_description" rows="1">{{$data['detailProduct']['ms_product_meta_description']}}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Tags</label>
                                        <input type="text" id="tags" class="form-control" name="ms_product_meta_keyword" value="{{$data['detailProduct']['ms_product_meta_keyword']}}">
                                    </div>
                                </div>
                            </div>
            
                            <a href="{{route('masterProduct.index')}}" class="btn btn-warning" style="float: left">Kembali</a>
                            <button class="btn btn-primary" style="float: right" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('templateAdmin.footer')
		</div>
       
	</div>
</body>
@include('templateAdmin.styleGlobalJs')
</html>    