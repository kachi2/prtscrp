<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="js">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Welcome') | {{ site_info('name') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/apps.css?ver=1.1.0') }}">
@if (!empty(global_meta_content('seo')))
    {!! global_meta_content('seo') !!}
@endif
@if (!empty(global_meta_content('share')))
    {!! global_meta_content('share') !!}
@endif
@if(sys_settings('google_track_id'))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ sys_settings('google_track_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', "{{ sys_settings('google_track_id') }}");
    </script>
@endif
@if(has_recaptcha())
    <script src="https://www.google.com/recaptcha/api.js?render={{recaptcha_key('site')}}"></script>
@endif
@if(sys_settings('header_code'))
    {{ html_string(sys_settings('header_code')) }}
@endif
</head>
<body class="nk-body npc-cryptlite pg-auth{{ (gui('skin', 'auth')=='dark') ? ' is-dark' : '' }}">
<div class="nk-app-root">
    <div class="nk-wrap">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">

            {{ site_branding('header', ['panel' => 'auth', 'size' => 'lg', 'class' => 'pb-4']) }}

            @yield('content')

            {!! Panel::socials('any', ['class' => 'icon-list justify-center pt-4',  'parent' => true ]) !!}

        </div>

        @include('auth.layouts.footer')
    </div>
</div>
<script src="{{ asset('/assets/js/bundle.js') }}"></script>
<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="//code.tidio.co/6yunkq3tvocqai8uaaquym9qjyrzgtlx.js" async></script>
@stack('scripts')
@if(sys_settings('tawk_api_key'))

@endif
@if(sys_settings('footer_code'))
    {{ html_string(sys_settings('footer_code')) }}
@endif
</body>
</html>