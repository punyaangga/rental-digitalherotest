
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="robots" content="index, follow">
<meta name="csrf-token" content="{{ csrf_token() }}">
@foreach ($setting as $settings )
    @if($settings['app_category'] == 'app favicon')
        <link rel="icon" href="{{asset($settings['app_values'])}}">
    @elseif($settings['app_category'] == 'seo meta description')
        <meta name="description" content="{{ $settings['app_values'] }}">
    @elseif($settings['app_category'] == 'seo meta keywords')
        <meta name="keywords" content="{{ $settings['app_values'] }}">
    @elseif($settings['app_category'] == 'seo meta author')
        <meta name="author" content="{{ $settings['app_values'] }}">
    @elseif($settings['app_category'] == 'seo meta title')
        <title>{{ $settings['app_values'] }}</title>
    @endif
@endforeach


