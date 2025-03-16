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
                    <li class="breadcrumb-item"><a href="#">Produk</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Stok Produk</li>
                    </ol>
                </nav>
                {{-- <button id="deleteButton" class="save btn btn-danger btn-sm">Hapus</button> --}}
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="card-title" style="float: left; margin:10px;">Data Stok Kain</h6>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('stockProduct.create') }}" class="btn btn-primary" style="float: right; margin:10px;">Tambah Data</a>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table data-tables ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Cabang</th>
                                            <th>Barcode</th>
                                            <th>Nama Produk</th>
                                            <th>Qty(roll)</th>
                                            <th>Qty(kg)</th>
                                            <th>Warna</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead style="width:10px;">
                                    <tbody>
                                    </tbody>
                                </table>
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
@include('templateAdmin.sweetAlertConfirmation')
<script type="text/javascript">
    $(function () {
        // get data from controller to datatable
        var table = $('.data-tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('stockProduct.index') }}",
            columns: [
                    { 
                    data: 'no', 
                    name: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {data: 'bs_name', name: 'bs_name'},
                {data: 'sp_barcode', name: 'sp_barcode'},
                {data: 'ms_product_name', name: 'ms_product_name'},
                {data: 'roll', name: 'roll'},
                {data: 'sp_qty', name: 'sp_qty'},
                {data: 'mc_name', name: 'mc_name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
  });
</script>
</html>    