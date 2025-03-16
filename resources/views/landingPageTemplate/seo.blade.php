
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="apple-mobile-web-app-capable" content="yes">
    @foreach ($setting as $settings)
        @if ($settings['app_category'] == 'app name')
            <title>{{$settings['app_values']}}</title>
        @endif
        @if ($settings['app_category'] == 'seo meta keywords')
            <meta name="keywords" content="{{$settings['app_values']}}">
        @endif
        @if ($settings['app_category'] == 'seo meta author')
            <meta name="author" content="{{$settings['app_values']}}">
        @endif

        @if ($settings['app_category'] == 'seo meta description')
            <meta name="description" content="{{$settings['app_values']}}">
        @endif
    @endforeach

