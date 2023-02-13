<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter,e_commerce,ecommerce,Template, eCommerce">
    <meta name="robots" content="all">
    <title>Marazzo </title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/bootstrap.min.css')}}">
    <!-- Customizable CSS -->

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/front/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/blue.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/owl.transitions.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/rateit.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/bootstrap-select.min.css')}}">
    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{asset('assets/front/assets/css/font-awesome.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


</head>
<body class="cnt-home">



<link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @include('front.includes.header-top')

{{--    <main class="py-4">--}}
        @yield('content')
{{--    </main>--}}

    @include('front.includes.footer')


</body>
</html>
