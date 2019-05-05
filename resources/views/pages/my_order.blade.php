@extends("app")

@section('head_title', 'My Orders' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>My Orders</h1>
      </div>
    </div>
  </div>
 
 <div class="white_for_login">
    <div class="container margin_60">
      <div class="col-md-offset-2 col-md-9">                
        <div class="box_style_2">
      <h2 class="inner">Order List</h2>
      <table class="table table-striped nomargin">
      <tbody>
        <tr>
        <th>Date</th>
        <th>Restaurant</th>
        <th>Menu Name</th>
        <th>Quantity</th>
        <th>Item Price</th>
        <th>Total Price</th>
        <th>Status</th>
        <th>Action</th>
         
        </tr>
        @foreach($order_list as $order_item)
                 
                <tr>
                <td>{{date('m-d-Y',$order_item->created_date)}}</td> 
                <td><a href="{{ url('restaurants/'.\App\Restaurants::getRestaurantsInfo($order_item->restaurant_id)->restaurant_slug) }}" class="text-regular">{{ \App\Restaurants::getRestaurantsInfo($order_item->restaurant_id)->restaurant_name }}</a>
                </td> 
                <td>{{$order_item->item_name}} </td>
                <td><strong class="">{{$order_item->quantity}}</strong></td>
                <td><strong class="">{{getcong('currency_symbol')}}{{ \App\Menu::getMenunfo($order_item->item_id)->price }}</strong></td>
                <td><strong class="">{{getcong('currency_symbol')}}{{$order_item->item_price}}</strong></td>
                <td><strong class="">{{$order_item->status}}</strong></td>
                @if($order_item->status!='Cancel' and $order_item->status!='Completed')

                <td><a href="{{URL::to('cancel_order/'.$order_item->id)}}" class=""><strong>Cancel</strong></a></td>
                @else
                 
                @endif
              </tr>
       @endforeach
        
        
         
      </tbody>
      </table>
      <br>
    </div>

      </div>
    </div>
  </div>

@endsection
