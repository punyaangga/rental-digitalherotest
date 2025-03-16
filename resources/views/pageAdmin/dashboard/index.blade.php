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
                    <li class="breadcrumb-item"><a href="#">Daftar Menu</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Galeri</li> --}}
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 stretch-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6 class="card-title" style="float: left; margin:10px;">Daftar Menu</h6>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData" style="float: right; margin:10px;">
                                            Tambah Menu
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered data-tables">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Foto</th>
                                                    <th>Nama</th>
                                                    <th>Deskripsi</th>
                                                    <th>Harga</th>
                                                    <th>Kategori</th>
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
                    </div>
                </div>
		</div>
        @include('templateAdmin.footer')
	</div>
</body>
@include('templateAdmin.styleGlobalJs')
<script type="text/javascript">
    $(function () {
        // get data from controller to datatable
        var table = $('.data-tables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "#",
            columns: [
                    { 
                    data: 'no', 
                    name: 'no',
                    render: function (data, type, row, meta) {
                        return meta.row + 1;
                    }
                },
                {data: 'image', name: 'image'},
                {data: 'nama_menu', name: 'nama_menu'},
                {data: 'deskripsi_menu', name: 'deskripsi_menu'},
                {data: 'harga_menu', name: 'harga_menu'},
                {data: 'nama_kategori', name: 'nama_kategori'},
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