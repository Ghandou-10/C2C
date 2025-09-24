<!DOCTYPE html>
<html dir="ltr" lang="{{ app()->getLocale() }}">
<head>
    <title>{{ $title ? $title .' | '. app_name() : app_name() }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ app_favicon() }}" type="image/x-icon"/>
    <!-- [Google Font : Public Sans] icon -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <!-- styles -->

    @vite([
    'Modules/Dashboard/Resources/assets/js/flatAble/flatAble.js',
            'Modules/Dashboard/Resources/assets/scss/flatAble/flatAble.scss',
 ])

    @stack('css')
</head>
<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="{{ Locales::getDir() }}" data-pc-theme="light">
<div id="vue">
    <!-- [ Pre-loader ] start -->
    @include('dashboard::flatAble.components.base._loader')
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            {{--            logo --}}
            @include('dashboard::flatAble.components.base._logo')
            {{--            user info--}}
            @include('dashboard::flatAble.components.base._sideBarAdminInfo')
            <div class="navbar-content">
                <ul class="pc-navbar">
                    @include('dashboard::sidebar')
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->
    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <!-- [Mobile Media Block] start -->
        <div class="header-wrapper">
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    @include('dashboard::flatAble.components.base._sideBarToggle')
                    {{--                    @include('dashboard::flatAble.components.base._search')--}}
                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    {{--                    @include('dashboard::flatAble.components.base._notifications')--}}
                    @include('dashboard::flatAble.components.base._languages')
                    @include('dashboard::flatAble.components.base._adminInfo')
                </ul>
            </div>
        </div>
    </header>
    <!-- [ Header ] end -->


    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-sm-auto">
                            <div class="page-header-title">
                                <h5 class="mb-0">{{ $title }}</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            @if(!Browser::isMobile())
                                <check-internet></check-internet>
                            @endif
                        </div>

                        <div class="col-sm-auto">
                            <ul class="breadcrumb">
                                @isset($breadcrumbs)
                                    {{ Breadcrumbs::render(...$breadcrumbs) }}
                                @endisset
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->

            <!-- [ Main Content ] start -->
            @include('flash::message')
            {{--            <import-component></import-component>--}}
            {{--            <code-generation-component></code-generation-component>--}}
            {{ $slot }}
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col my-1">
                    <p class="m-0">
                        © {{ now()->year }} {{ config('app.name', 'Laravel') }} &#9829;
                    </p>
                </div>
                {{--                <div class="col-auto my-1">--}}
                {{--                    <ul class="list-inline footer-link mb-0">--}}
                {{--                        <li class="list-inline-item"><a href="../index.html">Home</a></li>--}}
                {{--                        <!-- todo link update -->--}}
                {{--                        <li class="list-inline-item">--}}
                {{--                            <a href="https://phoenixcoded.gitbook.io/flat-able-bootstrap/" target="_blank">Documentation</a>--}}
                {{--                        </li>--}}
                {{--                        <li class="list-inline-item">--}}
                {{--                            <a href="https://phoenixcoded.authordesk.app/" target="_blank">Support</a></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
        </div>
    </footer>
</div>

@routes
@stack('js')
</body>
</html>
