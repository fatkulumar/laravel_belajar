<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'HADI LUR' }}</title>

    <!-- Scripts -->
    {{--  <script src="{{ asset('js/app.js') }}"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
    {{--  <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/datatables.js') }}"></script>  --}}


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
    {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>  --}}
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300);

     .footer{
        background-color: #87CEFA;
        border: 1px solid #f0f0f0;
        border-radius: 8px;	
        margin:-80px 100px 0px 100px;
        text-align:center;
        padding: 20px;
        font-weight: 900;

        }
        .loading{
            height:100px;
            text-align:center;
        left: 110px;
        buttom: 0px;
        z-index: 0;
        }


                .lds-dual-ring {
        display: inline-block;
        width: 64px;
        height: 64px;
        }
        .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 46px;
        height: 46px;
        margin: 1px;
        border-radius: 50%;
        border: 5px solid #000;
        border-color: #000 transparent #000 transparent;
        animation: lds-dual-ring 1.2s linear infinite;
        }
        @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
        }

        
        .lightbox {
        /** Default lightbox to hidden */
        display: none;

        /** Position and style */
        position: fixed;
        z-index: 999;
        width: 100%;
        height: 100%;
        text-align: center;
        top: 0;
        left: 0;
        background: rgba(0,0,0,0.8);
        }

        .lightbox img {
            /** Pad the lightbox image */
            max-width: 90%;
            max-height: 80%;
            margin-top: 2%;
        }

        .lightbox:target {
            /** Remove default browser outline */
            outline: none;

            /** Unhide lightbox **/
            display: block;
        }
        
        body{
            background-color:#f9f9f9;
            font-size:16px
            color:#444;
            font-family: sans-serif;
        }

        .content{
            width: 80%;
            margin: 10px auto;
        }

        /*header*/
        header{
            background-color: white;
            padding: 20px 10px;
            border-radius: 5px;
            border: 1px solid #f0f0f0;
            margin-bottom: 10px;
        }

        header h1.judul,
        header h3.deskripsi{
            text-align: center;	
        }

        /*menu navigasi*/
        .menu1{
        /* border: 1px solid #f0f0f0;
            border-radius: 8px;	*/
            padding:30px;
            display:block;
        }
        .menu{
            background-color: #87CEFA;
            border: 1px solid #f0f0f0;
            border-radius: 8px;	
            margin-bottom: 10px;
            padding-top: 20px;
        }

        div.menu ul {
            list-style:none;
            overflow: hidden;
        }


        div.menu ul li {
            float:left;		
            text-transform:uppercase;
        }

        div.menu ul li a {
            display:block;	
            padding:0 20px;
            text-decoration:none;
            color:#2c2c2c;
            font-family: sans-serif;
            font-size:13px;
            font-weight:400;
            transition:all 0.3s ease-in-out;
        }

        div.menu ul li a:hover,
        div.menu ul li a.hoverover {	
            cursor: pointer;	
            color:#fff;
        }


        div.badan{
            background-color: white;
            border-radius: 5px;
            border: 1px solid #f0f0f0;
            margin-bottom: 10px;
        }

        div.halaman{
            text-align: center;
            padding: 30px 20px;	
        }

        .d{
            /* margin-right: 90px; */
            position: relative;
            z-index: 999;
        }
        /*thead {
            display:none;
        }*/
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ 'HADI LUR' }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        {{--  @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest  --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer">
            CopyRight@2019 Fatkhul Umar || CV.GLOBAL SOLUSINDO
        </footer>
        {{--  <script>
            $(document).ready( function () {
                $('.loading').hide();
            });
        </script>  --}}
    </div>
</body>
</html>
<script>
$(document).ready( function () {
    setInterval("$('.menu1').show();", 2000);
    setInterval("$('.loading').hide();", 2000);
});
</script>

