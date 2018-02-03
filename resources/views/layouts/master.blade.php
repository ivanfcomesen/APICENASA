<html lang="{{ app()->getLocale() }}">  
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}" >
        @yield('stylesheets')
    </head>
    <body class="skin-blue" >
        <div class="wrapper">              
            @include('partials.header')
            @include('partials.sidebar')  
            <div class="content-wrapper">            
                <div class="content body" style="padding:5px">                    
                    @yield('content')                    
                </div>
            </div>
        </div>
        <script src="{{ asset('js/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('script')  
    </body>
</html>