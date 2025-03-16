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
                        <li class="breadcrumb-item"><a href="{{route('stockProduct.index')}}">Data Stok</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Input Data Stok</h6>
                        <form method="POST" action="{{route('stockProduct.store')}}">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Cabang</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="id_branch">
                                            @foreach ($data['listBranchStores'] as $listBranch)
                                                <option value="{{$listBranch['id']}}">{{$listBranch['bs_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Produk</label>
                                        <select id="product-select" class="js-example-basic-single form-select" data-width="100%" name="id_product">
                                            <option value=" ">Pilih Produk</option>
                                            @foreach ($data['listProduct'] as $listProduct)
                                                <option value="{{$listProduct['id']}}" data-category="{{$listProduct['cp_name']}}">{{$listProduct['ms_product_name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori Produk</label>
                                        <input type="text" class="form-control" placeholder="Kategori Produk" id="category-input" readonly>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <label class="form-label">Warna</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="id_color">
                                            @foreach ($data['listColor'] as $listColor)
                                                <option value="{{$listColor['id']}}">{{$listColor['mc_name']}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Barcode Stok</label>
                                        <input type="text" class="form-control" placeholder="Masukan barcode" name="sp_barcode" value="{{old('sp_barcode')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Qty(Kg)</label>
                                        <input type="number" class="form-control" placeholder="Masukan Quantity Stok" name="sp_qty" value="{{old('sp_qty')}}">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Tipe Stok</label>
                                        <div id="the-basics" style="width:100%">
                                        <input class="typeahead" type="text" placeholder="Body Atau Rib" name="sp_type" id="search-box">
                                        <label style="font-size:10px; color:gray;">*Jika tidak di isi defaultnya adalah body</label>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Barang</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga Barang" id="price1" name="mp_price[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Untuk Satuan</label>
                                        <input type="text" class="form-control" value="kg" name="mp_type_price[]" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Harga Barang</label>
                                        <input type="number" class="form-control" placeholder="Masukan Harga Barang"  id="price2" name="mp_price[]">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Untuk Satuan</label>
                                        <input type="text" class="form-control" value="roll" name="mp_type_price[]" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" >
                                        <div class="form-check" style="float: right;">
                                            <input type="checkbox" class="form-check-input" id="copyPriceCheck" style="float: right; margin-left:10px;">
                                            <label class="form-check-label" for="copyPriceCheck" style="float: right;"><b> Centang Jika Harga Kg & Roll Sama</b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="mb-4">
                                <h6 class="card-title">Aksesoris</h6>
                                <label>Data ini bertujuan untuk memberikan informasi pada pembeli bahwa barang yang dijual terdapat aksesoris yang berkaitan dengan produk yang dijual</label>
                                <button type="button" id="addBankAccount" class="btn btn-success mb-3" style="float: right;">+ Tambah Aksesoris</button>
                            </div>
                            <table class="table table-bordered-none accessories-table">
                                <tbody id="aksesorisTableBody">
                                    <tr>
                                        <td style="width: 100%">
                                            <select class="js-example-basic-single form-select" data-width="100%" name="spr_child_id[]">
                                                <option value=" ">Pilih Aksesoris</option>
                                                @foreach ($data['listStockProduct'] as $listStockProduct)
                                                    <option value="{{$listStockProduct['id']}}">{{$listStockProduct['sp_barcode'].' - '.$listStockProduct['ms_product_name']." - ".$listStockProduct['sp_type']}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Template for dynamically adding rows -->
                            <template id="bankAccountTemplate">
                                <tr class="bank-account-form">
                                    <td>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="spr_child_id[]">
                                            <option value=" ">Pilih Aksesoris</option>
                                            @foreach ($data['listStockProduct'] as $listStockProduct)
                                                <option value="{{$listStockProduct['id']}}">{{$listStockProduct['sp_barcode'].' - '.$listStockProduct['ms_product_name']." - ".$listStockProduct['sp_type']}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger removeBankAccount" style="float: right">Hapus</button>
                                    </td>
                                </tr>
                            </template>
                            <a href="{{route('stockProduct.index')}}" class="btn btn-warning" style="float: left">Kembali</a>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addBankAccountButton = document.getElementById('addBankAccount');
        const bankAccountsContainer = document.getElementById('aksesorisTableBody');
        const bankAccountTemplate = document.getElementById('bankAccountTemplate').content;

        addBankAccountButton.addEventListener('click', function () {
            const newBankAccountForm = document.importNode(bankAccountTemplate, true);
            bankAccountsContainer.appendChild(newBankAccountForm);
            initializeSelect2(bankAccountsContainer);
        });

        bankAccountsContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('removeBankAccount') || event.target.classList.contains('removeAksesoris')) {
                event.target.closest('tr').remove();
            }
        });

        function initializeSelect2(context) {
            $(context).find('.js-example-basic-single').select2();
        }
    });

</script>
<script>
        document.getElementById('copyPriceCheck').addEventListener('change', function() {
            const price1 = document.getElementById('price1').value;
            const price2 = document.getElementById('price2');

            if (this.checked) {
                price2.value = price1;  // Salin nilai dari price1 ke price2
                price2.readOnly = true; // Buat input kedua menjadi read-only saat ceklis
            } else {
                price2.readOnly = false; // Buka kembali input kedua saat ceklis tidak aktif
            }
        });
    </script>
    <script src={{asset('assets/js/categoryOfProducts.js')}}></script>
</html>
