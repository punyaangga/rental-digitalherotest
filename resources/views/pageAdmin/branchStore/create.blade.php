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
                        <li class="breadcrumb-item"><a href="{{route('branchStore.index')}}">Data Cabang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Form Input Data Cabang</h6>
                        <form method="POST" action="{{route('branchStore.store')}}">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Cabang</label>
                                        <input type="text" class="form-control" placeholder="Nama Cabang" name="bs_name" value="{{old('bs_name')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telp</label>
                                        <input type="number" class="form-control" placeholder="Masukan No Telp" name="bs_phone_number" value="{{old('bs_phone_number')}}">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="bs_address" rows="1">{{old('bs_address')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status Operasional Cabang</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="bs_status">
                                            <option value="1">Aktif</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <hr>
                                <div class="mb-4">
                                    <h6 class="card-title">Nomor Rekening Cabang</h6>
                                    <label>Data ini bertujuan untuk memberikan informasi pada pembeli untuk melakukan transfer pembayaran</label>
                                    <button type="button" id="addBankAccount" class="btn btn-success mb-3" style="float: right;">+ Tambah Rekening</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Bank</label>
                                        <select class="js-example-basic-single form-select" data-width="100%" name="id_bank[]">
                                            @foreach ($data['listBank'] as $listBank)
                                            <option value="{{$listBank['id']}}">{{$listBank['mdb_name']}}</option>
                                            @endforeach
                                          
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Rekening</label>
                                        <input type="text" name="bbd_account_number[]" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pemilik Rekening</label>
                                        <input type="text" name="bbd_account_name[]" class="form-control">
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="row" id="bankAccounts">
                                <!-- This is where the forms will be dynamically added -->
                            </div>
                            <br><br>
                            
                            <a href="{{route('branchStore.index')}}" class="btn btn-warning" style="float: left">Kembali</a>
                            <button class="btn btn-primary" style="float: right" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            @include('templateAdmin.footer')
		</div>
       
	</div>
    <!-- Template for bank account form -->
    <template id="bankAccountTemplate">
        <div class="row bank-account-form mb-3">
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Nama Bank</label>
                    <select class="js-example-basic-single form-select" data-width="100%" name="id_bank[]">
                        @foreach ($data['listBank'] as $listBank)
                        <option value="{{$listBank['id']}}">{{$listBank['mdb_name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Nomor Rekening</label>
                    <input type="text" name="bbd_account_number[]" class="form-control" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <label class="form-label">Nama Pemilik Rekening</label>
                    <input type="text" name="bbd_account_name[]" class="form-control">
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <button type="button" class="btn btn-danger removeBankAccount" style="margin-top:10px;">Hapus</button>
            </div>
        </div>
    </template>
</body>
@include('templateAdmin.styleGlobalJs')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const addBankAccountButton = document.getElementById('addBankAccount');
        const bankAccountsContainer = document.getElementById('bankAccounts');
        const bankAccountTemplate = document.getElementById('bankAccountTemplate').content;
    
        addBankAccountButton.addEventListener('click', function () {
            const newBankAccountForm = document.importNode(bankAccountTemplate, true);
            bankAccountsContainer.appendChild(newBankAccountForm);
            initializeSelect2(newBankAccountForm);
        });
    
        bankAccountsContainer.addEventListener('click', function (event) {
            if (event.target.classList.contains('removeBankAccount')) {
                event.target.closest('.bank-account-form').remove();
            }
        });
    
        function initializeSelect2(context) {
            $(context).find('.js-example-basic-single').select2();
        }
    });
    </script>
</html>    