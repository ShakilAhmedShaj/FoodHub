@extends("app")

@section('head_title', $restaurant->restaurant_name .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")

 <div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <div id="sub_content" class="animated zoomIn">
    <div class="col-md-2 col-sm-3">
      <div id="thumb"><img alt="{{$restaurant->restaurant_name}}" src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-b.jpg') }}"></div>
    </div>  
    <div class="col-md-10 col-sm-9">  
      <h1>{{$restaurant->restaurant_name}}</h1>
      <div class="sub_cont_rt">{{getcong_type($restaurant->restaurant_type)}}</div>
      <div class="sub_cont_lt"><i class="fa fa-map-marker"></i> {{$restaurant->restaurant_address}}</div>
      <div class="rating"> 
        @for($x = 0; $x < 5; $x++)
                  
              @if($x < $restaurant->review_avg)
                <i class="fa fa-star"></i>
              @else
                <i class="fa fa-star fa fa-star-o"></i>
              @endif
             
              @endfor
              (<small><a href="#0">Read {{$total_review}} Reviews</a></small>)

        
      </div>
      </div>
    </div>
      </div>
    </div>
  </div>

 

<div class="restaurant_list_detail">
    <div class="container">
      <div class="row"> 
        <div class="col-md-9 col-sm-7 col-xs-12">         
      <div class="box_style_2">
              <h2 class="inner">Description</h2>
              <span class="detail_con_text">{!!$restaurant->restaurant_description!!}</span>
              <div id="summary_review">
                <div id="general_rating"> {{$total_review}} Reviews
                  <div class="rating"> 
                    @for($x = 0; $x < 5; $x++)
                  
                    @if($x < $restaurant->review_avg)
                      <i class="fa fa-star"></i>
                    @else
                      <i class="fa fa-star fa fa-star-o"></i>
                    @endif
                   
                    @endfor
                  </div>
                </div>
                <div id="rating_summary" class="row">
                  <div class="col-md-6">
                    <ul>
                      <li>Food Quality
                        <div class="rating"> 
                          @for($x = 0; $x < 5; $x++)
                  
                          @if($x < DB::table('restaurant_review')->where('restaurant_id', $restaurant->id)->avg('food_quality'))
                            <i class="fa fa-star"></i>
                          @else
                            <i class="fa fa-star fa fa-star-o"></i>
                          @endif
                         
                          @endfor 
                        </div>
                      </li>
                      <li>Price
                        <div class="rating"> 
                          @for($x = 0; $x < 5; $x++)
                  
                          @if($x < DB::table('restaurant_review')->where('restaurant_id', $restaurant->id)->avg('price'))
                            <i class="fa fa-star"></i>
                          @else
                            <i class="fa fa-star fa fa-star-o"></i>
                          @endif
                         
                          @endfor 
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-6">
                    <ul>
                      <li>Punctuality
                        <div class="rating"> 
                           @for($x = 0; $x < 5; $x++)
                  
                          @if($x < DB::table('restaurant_review')->where('restaurant_id', $restaurant->id)->avg('punctuality'))
                            <i class="fa fa-star"></i>
                          @else
                            <i class="fa fa-star fa fa-star-o"></i>
                          @endif
                         
                          @endfor  
                        </div>
                      </li>
                      <li>Courtesy
                        <div class="rating"> 
                           @for($x = 0; $x < 5; $x++)
                  
                          @if($x < DB::table('restaurant_review')->where('restaurant_id', $restaurant->id)->avg('courtesy'))
                            <i class="fa fa-star"></i>
                          @else
                            <i class="fa fa-star fa fa-star-o"></i>
                          @endif
                         
                          @endfor
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <hr class="styled">
              
                 @if(Auth::check() and \App\Review::checkUserReview(Auth::id(),$restaurant->id)=='')
            
              <a href="#" class="btn_1 add_bottom_15" data-toggle="modal" data-target="#myReview">
            Leave a review</a>
            
            @elseif(\App\Review::checkUserReview(Auth::id(),$restaurant->id)!='')

              <a href="#0" class="btn_1 add_bottom_15">
            Already reviewed</a>

            @else

               <a href="{{ URL::to('login')}}" class="btn_1 add_bottom_15">
            Leave a review</a> 
            @endif

                
              </div>
               @foreach($reviews as $i => $review)
        <div class="review_strip_single"> <img src="{{ URL::asset('site_assets/img/male-icon.png') }}" alt="" class="img-circle"> <small> - {{date('d F Y',$review->date)}} -</small>
          <h4>{{ \App\User::getUserFullname($review->user_id) }} </h4>
          <p> {{$review->review_text}} </p>
          <div class="row">
            <div class="col-md-3">
              <div class="rating"> 
                  @for($x = 0; $x < 5; $x++)
                  
                  @if($x < $review->food_quality)
                    <i class="fa fa-star"></i>
                  @else
                    <i class="fa fa-star fa fa-star-o"></i>
                  @endif
                 
                  @endfor
              </div>
              Food Quality 
            </div>
            <div class="col-md-3">
              <div class="rating"> 
                @for($x = 0; $x < 5; $x++)
                  
                  @if($x < $review->price)
                    <i class="fa fa-star"></i>
                  @else
                    <i class="fa fa-star fa fa-star-o"></i>
                  @endif
                 
                  @endfor
              </div>
              Price 
            </div>
            <div class="col-md-3">
              <div class="rating"> 
               @for($x = 0; $x < 5; $x++)
                  
                  @if($x < $review->punctuality)
                    <i class="fa fa-star"></i>
                  @else
                    <i class="fa fa-star fa fa-star-o"></i>
                  @endif
                 
                  @endfor 
              </div>
              Punctuality 
            </div>
            <div class="col-md-3">
              <div class="rating"> 
                @for($x = 0; $x < 5; $x++)
                  
                  @if($x < $review->courtesy)
                    <i class="fa fa-star"></i>
                  @else
                    <i class="fa fa-star fa fa-star-o"></i>
                  @endif
                 
                  @endfor
              </div>
              Courtesy 
            </div>
          </div>
          <!-- End row --> 
        </div>
        <!-- End review strip -->
        @endforeach
      
      @include('_particles.pagination', ['paginator' => $reviews]) 
        
            </div>
           </div>
        <div class="col-md-3 col-sm-5 col-xs-12 side-bar">   
    <div class="box_style_2 sidebar_time_list">
          <h4 class="nomargin_top">Opening time <i class="fa fa-clock-o pull-right"></i></h4>
          <ul class="opening_list">
            <li>Monday<span>{{$restaurant->open_monday}}</span></li>
            <li>Tuesday<span>{{$restaurant->open_tuesday}}</span></li>
            <li>Wednesday <span>{{$restaurant->open_wednesday}}</span></li>
            <li>Thursday<span>{{$restaurant->open_thursday}}</span></li>
            <li>Friday<span>{{$restaurant->open_friday}}</span></li>
            <li>Saturday<span>{{$restaurant->open_saturday}}</span></li>
            <li>Sunday <span>{{$restaurant->open_sunday}}</span></li>
          </ul>
        </div>                                                                  
           
     <div id="help" class="box_style_2"> 
      <i class="fa fa-life-bouy"></i>
        <h4>{{getcong_widgets('need_help_title')}}</h4>
        <a href="tel://{{getcong_widgets('need_help_phone')}}" class="phone">{{getcong_widgets('need_help_phone')}}</a> <small>{{getcong_widgets('need_help_time')}}</small> 
      </div>
        </div>
      </div>
    </div>
  </div>


<!-- Register modal -->
<div class="modal fade" id="myReview" tabindex="-1" role="dialog" aria-labelledby="review" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content modal-popup"> <a href="#" class="close-link"><i class="fa fa-times-circle-o"></i></a>
      
        {!! Form::open(array('url' => 'restaurants/'.$restaurant->restaurant_slug.'/restaurant_review','class'=>'popup-form','name'=>'review','id'=>'review','role'=>'form')) !!} 
        <div class="login_icon"><i class="fa fa-comments-o"></i></div>
        <input name="restaurant_id" id="restaurant_id" type="hidden" value="{{$restaurant->id}}">
          
        <div class="row">
          <div class="col-md-6">
            <select class="form-control form-white" name="food_quality" id="food_quality" required>
              <option value="">Food Quality</option>
              <option value="1">Low</option>
              <option value="2">Sufficient</option>
              <option value="3">Good</option>
              <option value="4">Excellent</option>
              <option value="5">Super</option>
              
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control form-white"  name="price" id="price" required>
              <option value="">Price</option>
              <option value="1">Low</option>
              <option value="2">Sufficient</option>
              <option value="3">Good</option>
              <option value="4">Excellent</option>
              <option value="5">Super</option>
              
            </select>
          </div>
        </div>
        <!--End Row -->
        
        <div class="row">
          <div class="col-md-6">
            <select class="form-control form-white"  name="punctuality" id="punctuality" required>
              <option value="">Punctuality</option>
              <option value="1">Low</option>
              <option value="2">Sufficient</option>
              <option value="3">Good</option>
              <option value="4">Excellent</option>
              <option value="5">Super</option>
              
            </select>
          </div>
          <div class="col-md-6">
            <select class="form-control form-white"  name="courtesy" id="courtesy" required>
              <option value="">Courtesy</option>
              <option value="1">Low</option>
              <option value="2">Sufficient</option>
              <option value="3">Good</option>
              <option value="4">Excellent</option>
              <option value="5">Super</option>
              
            </select>
          </div>
        </div>
        <!--End Row -->
        <textarea name="review_text" id="review_text" class="form-control form-white" style="height:100px" placeholder="Write your review"></textarea>
        
        <input type="submit" value="Submit" class="review_btn-submit" id="submit-review">
      {!! Form::close() !!} 
      <div id="message-review"></div>
    </div>
  </div>
</div>
<!-- End Register modal --> 


@endsection
