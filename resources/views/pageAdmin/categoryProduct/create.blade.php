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
                        <li class="breadcrumb-item"><a href="{{route('categoryProduct.index')}}">Kategori Kain</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Input Data Kategori</h6>
                        <form method="POST" action="{{route('categoryProduct.store')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" placeholder="Nama Kategori" name="cp_name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText1" class="form-label">Deskripsi Kategori</label>
                                <textarea class="form-control" placeholder="Deskripsi Kategori" name="cp_description"></textarea>
                            </div>
                            
                            <a href="{{route('categoryProduct.index')}}" class="btn btn-warning" style="float: left">Kembali</a>
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