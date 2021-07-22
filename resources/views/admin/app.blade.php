<html>
<head>
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.partials.styles')
{{--    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('../../../../frontend/images/favicon.ico') }}">--}}
{{--    <link href="{{ asset('../../../../frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('../../../../frontend/fonts/fontawesome/css/fontawesome-all.min.css') }}" type="text/css"--}}
{{--          rel="stylesheet">--}}
{{--    <link href="{{ asset('../../../../frontend/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">--}}
{{--    <link href="{{ asset('../../../../frontend/plugins/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('../../../../frontend/plugins/owlcarousel/assets/owl.theme.default.css') }}" rel="stylesheet">--}}
{{--    --}}{{--<link href="{{ asset('../../../../frontend/css/ui.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('../../../../frontend/css/responsive.css') }}" rel="stylesheet"--}}
{{--          media="only screen and (max-width: 1200px)">--}}
</head>

<body class="app sidebar-mini rtl">
@include('admin.partials.header')
@include('admin.partials.sidebar')
<main class="app-content" id="app">
    @yield('content')
</main>
<script src="{{ URL::asset('../../../../backend/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ URL::asset('../../../../backend/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('../../../../backend/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('../../../../backend/js/main.js') }}"></script>
<script src="{{ URL::asset('../../../../backend/js/plugins/pace.min.js') }}"></script>
<script src="{{asset('../../../../js/app.js')}}"></script>
@stack('scripts')
</body>

</html>
