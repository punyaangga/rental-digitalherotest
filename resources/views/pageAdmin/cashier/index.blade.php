<!DOCTYPE html>
<html lang="en">
<head>
    @include('templateAdmin.seo')
    @include('templateAdmin.styleGlobalCss')
    @include('templateAdmin.styleGlobalJs')
    @include('templateAdmin.sweetAlertConfirmation')
    <script src="{{ asset('assets/js/cashierCalculation.js') }}"></script>
    <script>
        const updateProductUrl = "{{ route('cashier.update', ':id') }}";
        const storeProductUrl = "{{ route('cashier.store') }}";
        const cashierIndexUrl = "{{ route('cashier.index') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>

</head>
<body>
    <script>


    </script>
	<div class="main-wrapper">
		{{-- side bar  --}}@include('templateAdmin.sidebar'){{-- end sidebar --}}
		<div class="page-wrapper">
			{{-- header --}}@include('templateAdmin.header'){{-- end header --}}
			<div class="page-content">
                @include('templateAdmin.alertMessage')
                <nav class="page-breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Manajemen Kasir</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Bayar</li>
                    </ol>
                </nav>
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group" id="searchForm">

                                            @csrf
                                            <label>Masukan Barcode / Nama Barang</label>
                                            <input type="text" id="inputSearchProduct" class="form-control" id="inputSearchProduct" placeholder="Cari Barang" oninput="searchProduct(this.value)">
                                            <div id="searchResults"></div> <!-- Tempat menampilkan hasil pencarian -->


                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive" style="margin-top:25px;">
                                        <table class="table data-tables ">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Barcode</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah Pesanan</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead style="width:10px;">
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">

                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="totalPayment">Total Pembayaran:</label>
                                        <p id="totalPayment" class="h4">Rp 0</p>
                                        <br>
                                        <label for="changeAmount">Kembalian:</label>
                                        <input type="text" id="changeAmount" class="form-control" readonly>
                                        <form action="#" method="POST">
                                            @csrf
                                            <br>
                                            <label for="paymentAmount">Masukkan Pembayaran:</label>
                                            <input type="text" id=" " class="form-control" placeholder="Rp 0" oninput="formatInputRupiah(this)">
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-block float-end">  <i class="link-icon" data-feather="dollar-sign"></i> Bayar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('templateAdmin.footer')
		</div>

	</div>
</body>

</html>
