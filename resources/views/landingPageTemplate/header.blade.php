<div class="container-fluid">
    <div class="container-fluid">
        <div class="row py-1">
            <div class="d-flex justify-content-between align-items-center w-100">
                <nav class="main-menu d-flex navbar navbar-expand-lg w-100">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header justify-content-left">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body d-flex justify-content-between w-100">
                            <!-- Menu Utama -->
                            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                                <li class="nav-item"><a href="{{ route('index') }}" class="nav-link">Home</a></li>
                                <li class="nav-item active"><a href="{{ route('chart.index') }}" class="nav-link">Chart</a></li>
                                <li class="nav-item active"><a href="{{ route('booking.index') }}" class="nav-link">Booking List</a></li>
                            </ul>

                            <!-- Tombol Logout hanya muncul jika user login -->
                            @if(Auth::check())
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('logout') }}" class="nav-link fw-bold">Log Out</a>
                                    </li>
                                </ul>
                            @else
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link fw-bold">Log In</a>
                                    </li>
                                </ul>
                            @endif
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
