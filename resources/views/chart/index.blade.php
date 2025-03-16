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



    <section class="py-1">
        @include('chart.chartList')
    </section>



    <div id="footer-bottom">
        @include('landingPageTemplate.footer')
    </div>
    @include('landingPageTemplate.styleGlobalJs')
  </body>
</html>