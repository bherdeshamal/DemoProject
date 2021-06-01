<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{asset('css/frontcss/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/frontfonts/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontcss/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontcss/animate.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontcss/main.css')}}" rel="stylesheet">
	<link href="{{asset('css/frontcss/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('css/frontcss/easyzoom.css')}}" rel="stylesheet">
   
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('images/frontimages/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('images/frontimages/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('images/frontimages/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('images/frontimages/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('images/frontimages/ico/apple-touch-icon-57-precomposed.png')}}">
    
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head><!--/head-->

<body>
	
	@include('frontend.frontheader')

    @yield('content')
    
    @include('frontend.frontfooter')

    

  
    <script src="{{asset('js/frontjs/jquery.js')}}"></script>
	<script src="{{asset('js/frontjs/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/frontjs/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('js/frontjs/price-range.js')}}"></script>
    <script src="{{asset('js/frontjs/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('js/frontjs/easyzoom.js')}}"></script>

    <script src="{{ asset('admin/dist/js/main.js') }}"></script>
    <script src="{{asset('js/frontjs/main.js')}}"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>