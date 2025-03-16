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
                        <li class="breadcrumb-item"><a href="{{route('masterProduct.index')}}">Data Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('masterProduct.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Produk</label>
                                        <input type="file" id="myDropify" name="ms_product_image"/>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" placeholder="Nama Produk" name="ms_product_name" value="{{old('ms_product_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Produk</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="id_category">
                                            <option value="">Pilih Kategori</option>
                                           @foreach ($data['categoryProduct'] as $categoryProduct )
                                               <option value="{{$categoryProduct->id}}">{{$categoryProduct->category_name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Produk</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="mp_price">
                                            <option value="">Pilih Harga</option>
                                           @foreach ($data['listOfPrice'] as $listOfPrice )
                                               <option value="{{$listOfPrice->id}}">{{$listOfPrice->mp_price}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Deskripsi Produk</label>
                                        <textarea class="form-control" name="ms_product_description">{{old('ms_product_description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h6 class="card-title">SEO Produk (Optional)</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="ms_product_meta_description" rows="1">{{old('ms_product_meta_description')}}</textarea>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Tags</label>
                                        <input type="text" id="tags" class="form-control" name="ms_product_meta_keyword" value="Sewa PS,PS Murah">
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