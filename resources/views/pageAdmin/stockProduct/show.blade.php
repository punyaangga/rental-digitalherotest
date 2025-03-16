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
                        <li class="breadcrumb-item"><a href="{{route('branchStore.index')}}">Data Stok</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Input Data Stok</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Cabang</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['bs_name']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['ms_product_name']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Warna</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['mc_name']}}">

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Barcode Stok</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['sp_barcode']}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Qty</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['sp_qty'].' KG/'. $data['stockProduct']['roll'].' Roll'}}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tipe Stok</label>
                                        <div id="the-basics" style="width:100%">
                                            <input type="text" class="form-control" data-width="100%" readonly value="{{$data['stockProduct']['sp_type']}}">
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <hr>
                                <div class="mb-4">
                                    <h6 class="card-title">Harga Barang</h6>
                                    <label>Data ini bertujuan untuk memberikan informasi pada pembeli berapa harga barang yang dijual</label>
                                </div>
                            </div>
                            @foreach ($data['hargaStok'] as $hargaStok)


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Barang</label>
                                        <input type="text" class="form-control" data-width="100%" readonly value="{{$hargaStok['mp_price']}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Untuk Satuan</label>
                                        <input type="text" class="form-control"  readonly value="{{$hargaStok['mp_type_price']}}">
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <br>
                            <div class="row">
                                <hr>
                                <div class="mb-4">
                                    <h6 class="card-title">Aksesoris</h6>
                                    <label>Data ini bertujuan untuk memberikan informasi pada pembeli bahwa barang yang dijual terdapat aksesoris yang berkaitan dengan produk yang dijual</label>
                                </div>
                                <!-- Tambahkan class table-bordered, table-hover, dan table-responsive -->
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Barcode Aksesori</th>
                                                <th>Nama Aksesoris</th>
                                                <th>Tipe Aksesoris</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($data['aksesorisStok']) > 0)
                                            @foreach ($data['aksesorisStok'] as $aksesorisStok)
                                                <tr>
                                                    <td>{{ $aksesorisStok['sp_barcode'] }}</td>
                                                    <td>{{ $aksesorisStok['ms_product_name'] }}</td>
                                                    <td>{{ $aksesorisStok['sp_type'] }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3"><center>No Data</center></td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('stockProduct.index')}}" class="btn btn-warning" style="float: left">Kembali</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('stockProduct.edit',$data['stockProduct']['id'])}}" class="btn btn-success" style="float: right">Edit</a>
                                </div>
                            </div>






                    </div>
                </div>
            </div>
            @include('templateAdmin.footer')
		</div>

	</div>
</body>
@include('templateAdmin.styleGlobalJs')
</html>
