@extends("app")

@section('head_title', 'Restaurant Search' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

<div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>{{$total_res}} results for {{$keyword}}</h1>
      </div>
    </div>
  </div>

 <div class="restaurant_list_detail">
    <div class="container">
      <div class="row"> 
        <div class="col-md-9 col-sm-7 col-xs-12">         
          @foreach($restaurants as $i => $restaurant)
          
          <div data-wow-delay="0.{{$i}}s" class="strip_list wow fadeIn animated" style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
            <div class="row">         
            <div class="col-md-9 col-sm-12">
              <div class="desc">
              <div class="thumb_strip"> 
                <a href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">

                    <img src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-s.jpg') }}" alt="{{ $restaurant->restaurant_name }}">

                  </a>  
                </div>         
              <h3>{{ $restaurant->restaurant_name }}</h3>
              <div class="type"> {{$restaurant->type}} </div>
              <div class="location">{{$restaurant->restaurant_address}}  </div>

              <div class="rating"> 
                @for($x = 0; $x < 5; $x++)
                    
                @if($x < $restaurant->review_avg)
                  <i class="fa fa-star"></i>
                @else
                  <i class="fa fa-star fa fa-star-o"></i>
                @endif
               
                @endfor
                (<small><a href="{{URL::to('restaurants/'.$restaurant->restaurant_slug)}}">Read {{\App\Review::getTotalReview($restaurant->id)}} reviews</a></small>)
              </div>

               
              </div>
            </div>  
            <div class="col-md-3 col-sm-12">
              <div class="go_to">
              <div> <a class="btn_1" href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">View Menu</a> </div>
              </div>
            </div>
            </div>
          </div>

          @endforeach
      
          
                        
           </div>
          
          @include("_particles.sidebar")

      </div>
    </div>
  </div>

@endsection
