<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Restaurants;
use App\Cart;
use App\Order;
use App\Menu;
use App\Types;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
	 
    public function add_cart_item($item_id)    
    { 
        
        $user_id=Auth::user()->id;

        $find_cart_item = Cart::where(['user_id'=>$user_id,'item_id'=>$item_id])->first();
        

       if($find_cart_item!="")
       {
          $singl_item_price= $find_cart_item->item_price/$find_cart_item->quantity;


          $find_cart_item->increment('quantity');

          $new_quantity=$find_cart_item->quantity;

          $new_price=$singl_item_price*$new_quantity;

          $find_cart_item->item_price=$new_price;
          

          $find_cart_item->save();
       }
       else
       {
          $menu = Menu::findOrFail($item_id);

          $cart = new Cart; 

          $cart->user_id = $user_id;
          $cart->restaurant_id =$menu->restaurant_id;
          $cart->item_id = $menu->id; 
          $cart->item_name = $menu->menu_name;       
          $cart->item_price = $menu->price;         
          $cart->quantity= '1';  
           
          $cart->save();
       } 
              
       

        return \Redirect::back();
    }

     
    
    public function delete_cart_item($id)
    {
       
        
        $cart = Cart::findOrFail($id);        
          
        $cart->delete();
         
        return redirect()->back();

    }
     
    public function order_details()
    { 
        $user_id=Auth::user()->id;
        $user = User::findOrFail($user_id);

        return view('pages.cart_order_details',compact('user'));
    } 


    public function confirm_order_details(Request $request)
    { 
        $data =  \Input::except(array('_token')) ;
        
        $inputs = $request->all();
        
        
            $rule=array(
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|max:75',
                'mobile' => 'required',
                'city' => 'required',
                'postal_code' => 'required',
                'address' => 'required'
                 );
       
        
         $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 

        $user_id=Auth::user()->id;
           
        $user = User::findOrFail($user_id);
 
         
        
        $user->first_name = $inputs['first_name']; 
        $user->last_name = $inputs['last_name'];       
        $user->email = $inputs['email'];
        $user->mobile = $inputs['mobile'];
        $user->city = $inputs['city'];
        $user->postal_code = $inputs['postal_code'];
        $user->address = $inputs['address'];         
         
         
        $user->save();

        $cart_res=Cart::where('user_id',$user_id)->orderBy('id')->get();

        

        foreach ($cart_res as $n => $cart_item) {
            
            $order = new Order; 
 
            $order->user_id = $user_id;
            $order->restaurant_id =$cart_item->restaurant_id;
            $order->item_id = $cart_item->item_id; 
            $order->item_name = $cart_item->item_name;       
            $order->item_price = $cart_item->item_price;         
            $order->quantity= $cart_item->quantity;  

            $order->created_date= strtotime(date('Y-m-d'));  

            $order->status= 'Pending';
             
            $order->save();

            //Owner Mail
            $restaurant= Restaurants::findOrFail($cart_item->restaurant_id);
            $user_details= User::findOrFail($restaurant->user_id);    
            $order_list = Cart::where('user_id',$user_id)->orderBy('id')->get();

            $data = array(
            'name' => $inputs['first_name'],
            'order_list' => $order_list
            
             );     

            $subject2='New Order Placed'; 
            
            $owner_admin_order_email=$user_details->email;

            \Mail::send('emails.order_item_owner_admin', $data, function ($message) use ($subject2,$owner_admin_order_email){

                $message->from(getcong('site_email'), getcong('site_name'));

                $message->to($owner_admin_order_email)->subject($subject2);

            });

          }

           //$order_list = Order::where(array('user_id'=>$user_id,'status'=>'Pending'))->orderBy('item_name','desc')->get();
          $order_list = Cart::where('user_id',$user_id)->orderBy('id')->get();

            $data = array(
            'name' => $inputs['first_name'],
            'order_list' => $order_list
            
             );

            $subject=getcong('site_name').' Order Confirmed';
            
            $user_order_email=$inputs['email'];

            //User Email

            \Mail::send('emails.order_item', $data, function ($message) use ($subject,$user_order_email){

                $message->from(getcong('site_email'), getcong('site_name'));

                $message->to($user_order_email)->subject($subject);

            });
            
            //Admin/Owner Email

            $subject2='New Order Placed';
            


            $owner_admin_order_email=[getcong('site_email')];

            \Mail::send('emails.order_item_owner_admin', $data, function ($message) use ($subject2,$owner_admin_order_email){

                $message->from(getcong('site_email'), getcong('site_name'));

                $message->to($owner_admin_order_email)->subject($subject2);

            });


            /*$cart = Cart::findOrFail($cart_item->id);        
          
            $cart->delete();*/

       

        return view('pages.cart_order_confirm_details');
    } 


     public function user_orderlist()
    { 
        $user_id=Auth::user()->id;
        $order_list = Order::where('user_id',$user_id)->orderBy('id','desc')->orderBy('created_date','desc')->get();

        return view('pages.my_order',compact('order_list'));
    }

     public function cancel_order($order_id)
    { 
        $order = Order::findOrFail($order_id);
        

        $order->status = 'Cancel'; 
        $order->save();
        
        
        \Session::flash('flash_message', 'Order has been cancel');

        return \Redirect::back();

        
    }

 

}
