<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="bootstrap-tabs product-tabs">
                <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                    <h3>List Booking</h3>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                        </div>
                    </nav>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">

                            @if (!empty($data['listOrder']) && count($data['listOrder']) > 0)
                                @foreach ($data['listOrder'] as $listOrder)
                                    <div class="col">
                                        <div class="card shadow-sm">
                                            <div class="card-body">
                                                <h5 class="card-title">Order Number : <br>{{ $listOrder['order_number'] }}</h5>
                                                <p class="card-text">Virtual Account : {{ $listOrder['va_number'] }}</p>
                                                <p class="card-text">Payment Method : {{ $listOrder['payment_method'] }}</p>
                                                <p class="card-text">Total Payment : {{ $listOrder['total_price'] }}</p>
                                                <span class="btn btn-info ">{{ $listOrder['order_status'] }}</span>
                                                <a href="{{$listOrder['payment_url']}}" class="btn btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center">
                                    <p class="text-muted">Tidak ada data booking tersedia.</p>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
