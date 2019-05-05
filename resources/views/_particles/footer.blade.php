<footer>
    <div class="container">
      <ul class="row">
        <li class="col-sm-4">
          <h5>{{getcong_widgets('footer_widget1_title')}}</h5>
          <hr>
          <p>{!!getcong_widgets('footer_widget1_desc')!!}</p>
          <ul class="social_icons">            
           
            <li class="facebook"><a href="{{getcong_widgets('social_facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{getcong_widgets('social_twitter')}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{getcong_widgets('social_google')}}" target="_blank"><i class="fa fa-google"></i></a></li>
            <li><a href="{{getcong_widgets('social_instagram')}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
            <li><a href="{{getcong_widgets('social_pinterest')}}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="{{getcong_widgets('social_vimeo')}}" target="_blank"><i class="fa fa-vimeo"></i></a></li>
            <li><a href="{{getcong_widgets('social_youtube')}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
            
          </ul>
        </li>
        <li class="col-sm-4">
          <h5>{{getcong_widgets('footer_widget2_title')}}</h5>
          <hr>
          {!!getcong_widgets('footer_widget2_desc')!!}
        </li>
        <li class="col-sm-4">
          <h5>{{getcong_widgets('footer_widget3_title')}}</h5>
          <hr>
          <div class="loc-info">
            <p><i class="fa fa-map-marker"></i>{!!getcong_widgets('footer_widget3_address')!!}</p>
            <p><i class="fa fa-phone"></i> {{getcong_widgets('footer_widget3_phone')}}</p>             
            <p><i class="fa fa-envelope-o"></i><a href="mailto:{{getcong_widgets('footer_widget3_email')}}">{{getcong_widgets('footer_widget3_email')}}</a></p>
          </div>
        </li>
      </ul>
    </div>
  </footer>