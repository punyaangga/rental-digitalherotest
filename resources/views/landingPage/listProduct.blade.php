<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">

            <div class="bootstrap-tabs product-tabs">
                <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                    <h3>List Products</h3>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab" data-bs-toggle="tab" data-bs-target="#nav-all">All</a>

                        </div>
                    </nav>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                            @foreach ($data['dataProduct'] as $dataProduct)
                                <div class="col">
                                    <div class="product-item">
                                        <form method="POST" action="{{route('chart.store')}}">
                                            @csrf
                                            <input type="hidden" name="id_product" value="{{$dataProduct['id']}}">
                                            <figure>
                                                <img src="{{ asset($dataProduct['ms_product_image']) }}" class="tab-image">
                                            </figure>
                                            <h3>{{$dataProduct['ms_product_name']}}</h3>
                                            <span class="qty">
                                                {{$dataProduct['ms_product_description']}}
                                            </span>
                                            <span class="price">Rp {{ number_format($dataProduct['mp_price'], 0, ',', '.') }}</span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span>{{$dataProduct['category_name']}}</span>
                                                </div>
                                                <button type="submit" class="nav-link">Add to chart <iconify-icon icon="uil:shopping-cart"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    <!-- / product-grid -->
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>