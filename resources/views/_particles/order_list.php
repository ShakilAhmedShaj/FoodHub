<div class="col-md-3">
        <div id="cart_box">
          <h3>Your order <i class="icon_cart_alt pull-right"></i></h3>
          
          <table class="table table_summary">
            <tbody>
              @foreach(\App\Cart::where('user_id',Auth::id())->orderBy('id')->get() as $n=>$cart_item)
              <tr>
                <td><a href="{{URL::to('delete_item/'.$cart_item->id)}}" class="remove_item"><i class="icon_minus_alt"></i></a> <strong>{{$cart_item->quantity}}x</strong> {{$cart_item->item_name}} </td>
                <td><strong class="pull-right">{{$cart_item->item_price}}</strong></td>
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
                <td class="total"> TOTAL <span class="pull-right">{{$price = DB::table('cart')
                ->where('user_id', Auth::id())
                ->sum('item_price')}}</span></td>
              </tr>
            </tbody>
          </table>
          <hr>
          <a class="btn_full" href="cart.html">Order now</a> </div>
          @else
            <a class="btn_full" href="#">Empty Cart</a> </div>
          @endif
        <!-- End cart_box --> 
      </div>
      <!-- End col-md-3 --> 