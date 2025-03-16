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
                        <li class="breadcrumb-item active" aria-current="page">Kategori Kain</li>
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Kategori kain</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered data-tables">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Pesan</th>
                                        <th>Isi Pesan</th>
                                        <th width="100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('templateAdmin.footer')
		</div>
       
	</div>
</body>
@include('templateAdmin.styleGlobalJs')
<script type="text/javascript">
    $(function () {
        // get data from controller to datatable
        var table = $('.data-tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('categoryProduct.index') }}",
            columns: [
                    { 
                    data: 'no', 
                    name: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {data: 'cp_name', name: 'cp_name'},
                {data: 'cp_description', name: 'cp_description'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        // Handle row click event
    $('.data-tables tbody').on('click', 'tr', function () {
        var rowData = table.row(this).data(); // Get data of clicked row
        // Populate form fields with row data
        $('#nama_menu').val(rowData.nama_menu);
        $('#deskripsi_menu').val(rowData.deskripsi_menu);
        $('#harga_menu').val(rowData.harga_menu);
        $('#kategori_menu').val(rowData.nama_kategori);
        $('#uuid_menu').val(rowData.uuid_menu);
        
    });
  });

</script>

  

</html>    