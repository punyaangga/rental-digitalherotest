<!DOCTYPE html>
<html lang="en">

  <head>
    @include('landingPageTemplate.seo')
    @include('landingPageTemplate.styleGlobalCss')
  </head>
  <body>
    <header>
        @include('landingPageTemplate.header')
    </header>

    <section class="py-3" style="background: url('{{ asset('assets/images/landingPage/background-pattern.jpg') }}');background-repeat: no-repeat;background-size: cover;">
        @include('landingPage.promotion')
    </section>

    <section class="py-5" id="listProduct">
        {{-- @foreach ($data['dataProduct'] as $dataProduct) --}}
            {{-- @if ($dataProduct->category_id == 1) --}}
                {{-- <h2 class="text-center">{{ $dataProduct->category->name }}</h2> --}}
            {{-- @endif --}}
            @include('landingPage.listProduct')
        {{-- @endforeach --}}
    </section>


    <section class="py-5">
        @include('landingPage.registerDiscout')

    </section>

    <section id="latest-blog" class="py-5">
        @include('landingPage.blog')
    </section>

    <div id="footer-bottom">
        @include('landingPageTemplate.footer')
    </div>
    @include('landingPageTemplate.styleGlobalJs')
  </body>
</html>