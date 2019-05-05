<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>@yield('head_title', getcong('site_name'))</title>
<meta name="viewport"content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('head_description', getcong('site_description'))" />

<meta property="og:type" content="article" />
<meta property="og:title" content="@yield('head_title',  getcong('site_name'))" />
<meta property="og:description" content="@yield('head_description', getcong('site_description'))" />
<meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
<meta property="og:url" content="@yield('head_url', url('/'))" />
<!-- Favicons-->
	<link rel="shortcut icon" href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" type="image/x-icon">
<!--MAIN STYLE-->
<link href="{{ URL::asset('site_assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('site_assets/css/main.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('site_assets/css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('site_assets/css/animate.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('site_assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
<link href="{{ URL::asset('site_assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

{!!getcong('site_header_code')!!}

</head>
<body> 
	<div id="wrap" class="home-1">
	 	@include("_particles.header")  
	 	
	 	@yield("content")
	 	
	 	@include("_particles.footer")
	 	
	 
	 
  <div class="rights">
    <div class="container">
      <p class="font-montserrat">
      		@if(getcong('site_copyright'))
						
				{{getcong('site_copyright')}}
			
			@else
			
				Copyright © {{date('Y')}} {{getcong('site_name')}}. All rights reserved.

			@endif
	  </p>
    </div>
  </div>

<script src="{{ URL::asset('site_assets/js/jquery-1.11.0.min.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/bootstrap.min.js') }}"></script>
 
<script src="{{ URL::asset('site_assets/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/jquery.nouislider.min.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/jquery.sticky.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/jquery.stellar.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/wow.min.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/own-menu.js') }}"></script>  
<script src="{{ URL::asset('site_assets/js/main.js') }}"></script> 
<script src="{{ URL::asset('site_assets/js/nav_menu.js') }}"></script>
<script src="{{ URL::asset('site_assets/js/functions.js') }}"></script> 
</div>
</body>
</html>