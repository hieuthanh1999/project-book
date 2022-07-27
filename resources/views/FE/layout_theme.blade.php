<!doctype html>
<html class="no-js" lang="zxx">
@include('FE.layouts.head')
<body class="tg-home tg-homevtwo">

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Header Start
		*************************************-->
        @include('FE.layouts.header')
        @include('FE.layouts.banner')
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