
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        @foreach ($setting as $settings)
           @if ($settings['app_category'] == 'app name')
           <span> {{$settings['app_values']}} </span>
           @endif
        @endforeach
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
        <li class="nav-item nav-category">Master Data</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="archive"></i>
            <span class="link-title">Produk</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
            <ul class="nav sub-menu">

                <li class="nav-item">
                    <a href="{{route('masterProduct.index')}}" class="nav-link">Data Produk</a>
                </li>

            </ul>
            </div>
        </li>
        </ul>
    </div>
</nav>
