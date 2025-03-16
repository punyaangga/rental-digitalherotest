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
                        <li class="breadcrumb-item active" aria-current="page">Ubah Data</li>
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Ubah Data Kategori</h6>
                        <form method="POST" action="{{route('categoryProduct.update',$data['id'])}}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" placeholder="Nama Kategori" name="cp_name" value="{{ old('cp_name', $data['cp_name']) }}" oldvalue>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi Kategori</label>
                                <textarea class="form-control" placeholder="Deskripsi Kategori" name="cp_description">{{ old('cp_description', $data['cp_description']) }}</textarea>
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