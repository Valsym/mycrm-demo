<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <title>@yield("title") | MyCRM</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Дополнительно для разных устройств -->
    <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
    <style>
        .funnel-stats {
            border: 1px solid #dee2e6;
        }
        .funnel-stats .col {
            border-right: 1px solid #dee2e6;
        }
        .funnel-stats .col:last-child {
            border-right: none;
        }
    </style>
</head>

<body>

<header class="page-header">
    <div class="page-header__wrapper">

        @includeWhen(request()->is('demo*'), 'layouts.demo_banner')

        @includeWhen(request()->is('demo*'), 'layouts.demo_nav')
        @includeWhen(!request()->is('demo*'), 'layouts.nav')


    </div>
</header>


<main class="@yield('main_class', 'crm-content')">
    @yield('content')
</main>

@stack('scripts')

</body>
</html>
