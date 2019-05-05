@extends("app")
@section("content")
 
@include("_particles.search_slider") 

<!-- Content ================================================== --> 

<div id="blog_item">
  <div class="container">
  <h1 class="mb5 zui-highlight">Choose one to start building your order</h1>
   
   <nav id="list_shortcuts">
    <ul>
    @foreach($types as $type)
    <li> <a title="Chinese" href="{{URL::to('restaurants/type/'.$type->id)}}" data-cuisine="chinese"> <img alt="{{$type->type}}" src="{{ URL::asset('upload/type/'.$type->type_image.'.jpg') }}"> <span>{{$type->type}}</span> </a> </li>
    @endforeach
     

    </ul>
   </nav>
  </div>
  </div>

  <div class="white_bg">
    <div class="container margin_60">
      <div class="main_title">
        <h2 class="nomargin_top">Choose from Most Popular</h2>         
      </div>
      <div class="row">
        @foreach($restaurants as $i => $restaurant)
        <div class="col-md-6"> <a class="strip_list" href="{{URL::to('restaurants/menu/'.$restaurant->restaurant_slug)}}">
          <div class="desc">
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
                
              </div>
            <div class="thumb_strip"> <img src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-s.jpg') }}" alt="{{ $restaurant->restaurant_name }}"> </div>
          </div>
          </a> 
        </div>
        @endforeach
          
           
           
      </div>
    </div>
  </div>
 
<!-- End section --> 
<!-- End Content =============================================== --> 

@endsection
