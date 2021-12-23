<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front-end/assets/css/style.css')}}">
</head>
<body>
    @include('layouts.navbar')
    
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{asset('assets/front-end/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('assets/front-end/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('assets/front-end/assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('assets/front-end/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/slick.min.js')}}"></script>
    <!-- Date Picker -->
    <script src="{{asset('assets/front-end/assets/js/gijgo.min.js')}}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('assets/front-end/assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{asset('assets/front-end/assets/js/jquery.ticker.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/site.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('assets/front-end/assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.sticky.js')}}"></script>

    <!-- contact js -->
    <script src="{{asset('assets/front-end/assets/js/contact.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/mail-script.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{asset('assets/front-end/assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/front-end/assets/js/main.js')}}"></script>
</body>
</html>
