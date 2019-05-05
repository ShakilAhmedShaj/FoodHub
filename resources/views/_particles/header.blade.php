  <div class="top-bar">
    <div class="container">
      <ul class="left-bar-side">
        <li><p><i class="fa fa-envelope-o"></i><a href="mailto:{{getcong('site_email')}}">{{getcong('site_email')}}</a></p></li>
      </ul>
      <ul class="right-bar-side social_icons">
         <li class="facebook"><a href="{{getcong_widgets('social_facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{getcong_widgets('social_twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{getcong_widgets('social_google')}}" target="_blank"><i class="fa fa-google"></i></a></li>
            <li><a href="{{getcong_widgets('social_instagram')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="{{getcong_widgets('social_pinterest')}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="{{getcong_widgets('social_vimeo')}}" target="_blank"><i class="fa fa-vimeo"></i></a></li>
            <li><a href="{{getcong_widgets('social_youtube')}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
      </ul>
    </div>
  </div>
  <header class="sticky">
    <div class="container">
      <div class="logo"> <a href="{{ URL::to('/') }}"><img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" ></a> </div>
      <nav class="animenu">
      <button class="animenu_toggle"> 
         <span class="animenu_toggle_bar"></span> 
         <span class="animenu_toggle_bar"></span> 
         <span class="animenu_toggle_bar"></span> 
      </button>
      <ul class="animenu_nav">
            <li> <a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{URL::to('restaurants')}}">Restaurants</a></li>

            @if(Auth::check() and Auth::user()->usertype=='User')

             <li> <a href="javascript:void(0);">My Account<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('profile') }}">Edit Profile</a></li>
                <li><a href="{{ URL::to('change_pass') }}">Change Password</a></li>
                <li><a href="{{URL::to('myorder')}}">My Order</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>                
              </ul>
            </li>
            @elseif(Auth::check() and Auth::user()->usertype=='Owner')
              <li> <a href="javascript:void(0);">My Account<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>                
              </ul>
            </li>
            @elseif(Auth::check() and Auth::user()->usertype=='Admin')
              <li> <a href="javascript:void(0);">My Account<i class="icon-down-open-mini"></i></a>
              <ul class="animenu_nav_child">
                <li><a href="{{ URL::to('admin/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL::to('logout') }}">Logout</a></li>                
              </ul>
            </li>

              
            @else
 
            <li><a href="{{ URL::to('login') }}">Login</a></li>
            <li><a href="{{ URL::to('register') }}">Register</a></li>

            @endif

            <li><a href="{{ URL::to('about') }}">About us</a></li>
            <li><a href="{{ URL::to('contact') }}">Contact</a></li>              
          </ul>
       
       
    </nav>
    </div>
  </header>
   