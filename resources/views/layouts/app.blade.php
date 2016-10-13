<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>

        <title>@yield('title')</title>

        <!-- site meta -->
        <meta name="description" content="Droidtronix is a blog on programming and open source technologies">

        @hasSection('meta')
            @yield('meta')
        @endif

        <link href="/images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon"/>

        <link href="https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700,400italic,700italic&subset=latin,latin-ext" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Quattrocento:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />

        <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,700,700i&subset=latin-ext" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}"  type="text/css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css"/>
        <link rel="stylesheet" href="{{ asset('css/preset.css') }}" type="text/css" class="preset"/>
        <style type="text/css">
            #sp-bottom {
                padding:100px 0px 0px;
            }
        </style>

        <!-- sweet alert -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.2.0/sweetalert2.css">

        @hasSection('styles')
            @yield('styles')
        @endif

    </head>

    <body class="site com-content view-category layout-blog ltr sticky-header layout-fluid">

        <div class="body-innerwrapper">
            <header id="sp-header">
                @include('includes.navbar')
            </header>
            <section id="sp-page-title">
                <div class="row">
                    @yield('pagetitle')
                </div>
            </section>
            <section id="sp-main-body">
                <div class="container">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </section>

            <section id="sp-bottom">
                <div class="container">
                    <div class="row">
                        @include('includes.bottom')
                    </div>
                </div>
            </section>
            <footer id="sp-footer">
                <div class="container">
                    <div class="row">
                        @include('includes.footer')
                    </div>
                </div>
            </footer>
            @include('includes.offcanvasmenu')

        </div>




        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>


        <script src="{{ asset('js/theia-sticky-sidebar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

        <!-- sweetalert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.2.0/sweetalert2.js"></script>
        @include('sweet::alert')

        @hasSection('scripts')
            @yield('scripts')
        @endif


    </body>
</html>
