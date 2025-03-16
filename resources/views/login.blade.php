<!DOCTYPE html>
<html lang="en">
<head>
	@include('templateAdmin.seo')
    @include('templateAdmin.styleGlobalCss')
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                                <div class="col-md-12">
                                  @if(session('messageFunction'))
                                        @if(session('messageFunction') == 'Email Konfirmasi Berhasil Dikirim! Silahkan Cek Email Anda!' || session('messageFunction') == 'Akun Berhasil Diaktifkan. Silahkan Login!')
                                            <div class="alert alert-success">
                                                {{ session('messageFunction') }}
                                            </div> 
                                        @else
                                            <div class="alert alert-danger">
                                                {{ session('messageFunction') }}
                                            </div>
                                        @endif
                                    @endif
                                <div class="auth-form-wrapper px-4 py-5">
                                    <center>
                                        <a href="#" class="noble-ui-logo d-block mb-2">
                                        
                                            @foreach ($setting as $settings)
                                                @if ($settings['app_category'] == 'app name')
                                                    {{$settings['app_values']}}
                                                @endif
                                            @endforeach
                                        </a>
                                        <h5 class="text-muted fw-normal mb-4">Login Terlebih Dahulu Untuk Mengakses Aplikasi</h5>
                                    </center>
                                    <form class="forms-sample" action="{{ route('login') }}" method="POST">
                                        @csrf
                                    <div class="mb-3">
                                        <label for="userEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="userEmail" placeholder="Email">
                                        @error('email')
                                             <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="userPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="userPassword" autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        {{-- <label style="float: left" class="text-muted fw-normal mb-4"> Belum Punya akun? <a href="{{route('register')}}"> Daftar terlebih dahulu</a></label> --}}
                                        <button class="btn btn-primary me-2 mb-2 mb-md-0 text-white" style="float: right">Login</button>
                                        {{-- <a href="{{route('register')}}" style="float: right" class="btn btn-warning me-2 mb-2 mb-md-0 text-white">Register</a> --}}
                                      
                                    </div>
                                    </form>
                                </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
@include('templateAdmin.footer')
</body>
@include('templateAdmin.styleGlobalJs')
</html>