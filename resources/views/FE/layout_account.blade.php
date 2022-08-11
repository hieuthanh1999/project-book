<!doctype html>
<html class="no-js" lang="zxx">
<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kim Dong Library</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="{{URL::asset('FE/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/normalize.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/transitions.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/main.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/color.css')}}">
    <link rel="stylesheet" href="{{URL::asset('FE/css/responsive.css')}}">

    
    <script src="{{URL::asset('FE/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/vendor/jquery-library.js')}}"></script>
    <script src="{{URL::asset('FE/js/vendor/bootstrap.min.js')}}"></script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
    </script>
    <script src="{{URL::asset('FE/js/owl.carousel.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/jquery.vide.min.js')}}"></script>
    <script src="{{URL::asset('FE/js/countdown.js')}}"></script>
    <script src="{{URL::asset('FE/js/jquery-ui.js')}}"></script>
    <script src="{{URL::asset('FE/js/parallax.js')}}"></script>
    <script src="{{URL::asset('FE/js/countTo.js')}}"></script>
    <script src="{{URL::asset('FE/js/appear.js')}}"></script>
    <script src="{{URL::asset('FE/js/gmap3.js')}}"></script>
    <script src="{{URL::asset('FE/js/main.js')}}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <style type="text/css">
        a:hover,a:focus{
    text-decoration: none;
    outline: none;
}
.vertical-tab{
    font-family: 'Roboto', sans-serif;
    display: table;
}
.vertical-tab .nav-tabs{
   display: table-cell;
   width: 28%;
   min-width: 28%;
   border: none;
   border-right: 3px solid #079992;
   position: relative;
}
.vertical-tab .nav-tabs li{
   float: none;
   vertical-align: top;
}
.vertical-tab .nav-tabs li a{
    color: #606060;
    background-color: #f1f2f6;
    font-size: 18px;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 1px;
    padding: 15px 15px;
    margin: 0;
    border: none;
    border-radius: 0;
    display: block;
    position: relative;
    z-index: 1;
    transition: all 0.3s ease 0s;
}
.vertical-tab .nav-tabs li a:hover,
.vertical-tab .nav-tabs li.active a,
.vertical-tab .nav-tabs li.active a:hover{
    color: #079992;
    background-color: #fff;
    border: none;
}
.vertical-tab .nav-tabs li a:before,
.vertical-tab .nav-tabs li a:after{
    content: '';
    height: 20px;
    width: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0,0,0,0.3) inset;
    opacity: 0;
    transform: translateY(-50%) rotate(45deg);
    position: absolute;
    right: -10px;
    top: 100%;
    z-index: -1;
    transition: all 0.3s ease 0s;
}
.vertical-tab .nav-tabs li a:after{
    background-color: #079992;
    border-radius: 50%;
    height: 12px;
    width: 12px;
    right: 100%;
    top: 50%;
}
.vertical-tab .nav-tabs li.active a:before,
.vertical-tab .nav-tabs li a:hover:before{
    top: 50%;
    opacity: 1;
}
.vertical-tab .nav-tabs li.active a:after,
.vertical-tab .nav-tabs li a:hover:after{
    right: -6px;
    opacity: 1;
}
.vertical-tab .tab-content{
    color: #606060;
    font-size: 14px;
    text-align: justify;
    line-height: 23px;
    vertical-align: top;
    padding: 15px 15px 15px 30px;
    display: table-cell;
}
.vertical-tab .tab-content h3{
    color: #079992;
    font-size: 24px;
    margin: 0 0 5px 0;
}
@media only screen and (max-width: 479px){
    .vertical-tab .nav-tabs{
        display: block;
        width: 100%;
        border-right: none;
    }
    .vertical-tab .nav-tabs li a{
        padding: 10px;
        margin: 0 0 10px;
    }
    .vertical-tab .tab-content{
        display: block;
        padding: 20px 15px 5px;
        border-radius: 0 0 10px 10px;
    }
   
    </style>
</head>

<body class="tg-home tg-homevtwo">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('FE.layouts.header')
        <!--************************************
				Header End
		*************************************-->

        <!--************************************
				Main Start
		*************************************-->
        <main id="tg-main" class="tg-main tg-haslayout">
			@yield('content')
        </main>
        <!--************************************
				Main End
		*************************************-->
        <!--************************************
				Footer Start
		*************************************-->
        @include('FE.layouts.footer')
        <!--************************************
				Footer End
		*************************************-->
    </div>
    <!--************************************
			Wrapper End
	*************************************-->

</body>

</html>