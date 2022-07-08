<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    

    <title> Template part </title>

    <!-- Bootstrap Core CSS -->

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <!-- Custom CSS -->

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Custom Fonts -->

   <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
   <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,700,900' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>
   <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>


    <!-- Custom Animations -->

    <link rel="stylesheet" href="{{asset('css/animate.css')}}">

</head>

<body>



	@include('template.header')

    @yield('content')
    
    @include('template.footer')


    <!-- jQuery -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- Color Settings script -->
    <script src="{{asset('js/settings-script.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{asset('js/jquery.easing.min.js')}}"></script>
    <!-- Contact Form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    
    <!-- SmoothScroll script -->
    <script src="{{asset('js/smoothscroll.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{asset('js/xBe.js')}}"></script>
    <!-- Isotope -->
    <script type="text/javascript" src="{{asset('js/jquery.isotope.min.js')}}"></script>
    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?extension=.js&output=embed"></script>
    <!-- Footer Reveal scirt -->
    <script src="{{asset('js/footer-reveal.js')}}"></script>

</body>

</html>