@extends("app")

@section('head_title', 'Order Details' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>Your Order Details</h1>
      </div>
    </div>
  </div>

 <div class="restaurant_list_detail">
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-7 col-xs-12">
          <div class="box_style_2" id="order_process">
          <h2 class="inner">Your Order Details</h2>
          {!! Form::open(array('url' => 'order_details','class'=>'','id'=>'order_details','role'=>'form')) !!} 

            <div class="message">
                        <!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
                                    @if (count($errors) > 0)
                          <div class="alert alert-danger">
                          
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                                    
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">             
                {{ Session::get('flash_message') }}
            </div>
        @endif

          <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="First name">
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" id="last_name" value="{{$user->last_name}}" name="last_name" placeholder="Last name">
          </div>
          <div class="form-group">
            <label>Telephone/mobile</label>
            <input type="text" id="mobile" name="mobile" value="{{$user->mobile}}" class="form-control" placeholder="Telephone/mobile">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Your email">
          </div>           
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" id="city" name="city" value="{{$user->city}}" class="form-control" placeholder="Your city">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Postal code</label>
                <input type="text" id="postal_code" name="postal_code" value="{{$user->postal_code}}" class="form-control" placeholder=" Your postal code">
              </div>
            </div>
          </div>
           
          <hr>
          <div class="row">
            <div class="col-md-12">
              <label>Your full address</label>
              <textarea class="form-control" style="height:150px" placeholder="Address" name="address" id="address">{{$user->address}}</textarea>
            </div>
          </div>
             
      
        </div>
        <!-- End box_style_1 --> 
        </div>
    <div class="col-md-3 col-sm-5 col-xs-12 side-bar">   
    <div id="cart_box">
          <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
          
          <table class="table table_summary">
            <tbody>
              @foreach(\App\Cart::where('user_id',Auth::id())->orderBy('id')->get() as $n=>$cart_item)
              <tr>
                <td><a href="{{URL::to('delete_item/'.$cart_item->id)}}" class="remove_item"><i class="fa fa-minus-circle"></i></a> <strong>{{$cart_item->quantity}}x</strong> {{$cart_item->item_name}} </td>
                <td><strong class="pull-right">{{getcong('currency_symbol')}}{{$cart_item->item_price}}</strong></td>
              </tr>
              @endforeach
               
            </tbody>
          </table>
           
          <!-- Edn options 2 -->
          
          <hr>
          @if(DB::table('cart')->where('user_id', Auth::id())->sum('item_price')>0)
          <table class="table table_summary">
            <tbody>
              
              <tr>
                <td class="total"> TOTAL <span class="pull-right">{{getcong('currency_symbol')}}{{$price = DB::table('cart')
                ->where('user_id', Auth::id())
                ->sum('item_price')}}</span></td>
              </tr>
            </tbody>
          </table>
          <hr>
           
          <button type="submit" class="btn_full">Confirm Your Order</button>
        </div>

          {!! Form::close() !!} 
          @else
            <a class="btn_full" href="#">Empty Cart</a> </div>
          @endif
        <!-- End cart_box -->                                                                               
    <div id="help" class="box_style_2"> 
      <i class="fa fa-life-bouy"></i>
        <h4>{{getcong_widgets('need_help_title')}}</h4>
        <a href="tel://{{getcong_widgets('need_help_phone')}}" class="phone">{{getcong_widgets('need_help_phone')}}</a> <small>{{getcong_widgets('need_help_time')}}</small> 
      </div>
        </div>
                
      </div>
    </div>
  </div>
 

@endsection
