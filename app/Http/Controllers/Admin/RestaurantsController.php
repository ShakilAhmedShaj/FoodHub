<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Restaurants;
use App\Categories;
use App\Menu;
use App\Order;
use App\Types;
use App\Review;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class RestaurantsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function restaurants()    { 
        
              
        $restaurants = Restaurants::orderBy('restaurant_name')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
         
        return view('admin.pages.restaurants',compact('restaurants'));
    }
    
    public function addeditrestaurant()    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $types = Types::orderBy('type')->get();

        
        return view('admin.pages.addeditrestaurant',compact('types'));
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'restaurant_type' => 'required',
                'restaurant_name' => 'required',
                'restaurant_address' => 'required',
                'restaurant_logo' => 'mimes:jpg,jpeg,gif,png' 		         
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	    $inputs = $request->all();
		
		if(!empty($inputs['id'])){
           
            $restaurant_obj = Restaurants::findOrFail($inputs['id']);

        }else{

            $restaurant_obj = new Restaurants;

        }


        //Slug

        if($inputs['restaurant_slug']=="")
        {
            $restaurant_slug = str_slug($inputs['restaurant_name'], "-");
        }
        else
        {
            $restaurant_slug =str_slug($inputs['restaurant_slug'], "-"); 
        }

        //Logo image
        $restaurant_logo = $request->file('restaurant_logo');
         
        if($restaurant_logo){
            
             \File::delete(public_path() .'/upload/restaurants/'.$restaurant_obj->restaurant_logo.'-b.jpg');
            \File::delete(public_path() .'/upload/restaurants/'.$restaurant_obj->restaurant_logo.'-s.jpg');
            
            $tmpFilePath = 'upload/restaurants/';          
             
            $hardPath = substr($restaurant_slug,0,100).'_'.time();
            
            $img = Image::make($restaurant_logo);

            $img->fit(120, 120)->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(98, 98)->save($tmpFilePath.$hardPath. '-s.jpg');

            $restaurant_obj->restaurant_logo = $hardPath;
             
        }
		
        $user_id=Auth::User()->id;
		 
		$restaurant_obj->user_id = $user_id;
        $restaurant_obj->restaurant_type = $inputs['restaurant_type'];
        $restaurant_obj->restaurant_name = $inputs['restaurant_name']; 
		$restaurant_obj->restaurant_slug = $restaurant_slug;
        $restaurant_obj->restaurant_address = $inputs['restaurant_address']; 
        $restaurant_obj->restaurant_description = $inputs['restaurant_description']; 
        

        $restaurant_obj->open_monday = $inputs['open_monday'];
        $restaurant_obj->open_tuesday = $inputs['open_tuesday'];
        $restaurant_obj->open_wednesday = $inputs['open_wednesday'];
        $restaurant_obj->open_thursday = $inputs['open_thursday'];
        $restaurant_obj->open_friday = $inputs['open_friday'];
        $restaurant_obj->open_saturday = $inputs['open_saturday'];
        $restaurant_obj->open_sunday = $inputs['open_sunday']; 
		 
		
		 
	    $restaurant_obj->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editrestaurant($id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

          $types = Types::orderBy('type')->get();   	     
          $restaurant= Restaurants::findOrFail($id);
          
          return view('admin.pages.addeditrestaurant',compact('restaurant','types'));
        
    }	 
    
    public function delete($id)
    {
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $menu_obj = Menu::where(['restaurant_id' => $id])->delete();
        $review_obj = Review::where('restaurant_id',$id)->delete();
        $order_obj = Order::where('restaurant_id',$id)->delete();
        	
        $cat = Restaurants::findOrFail($id);
        $cat->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();

    }

    public function restaurantview($id)    
    {     
    
          if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

           
          $restaurant= Restaurants::findOrFail($id);
          
          $categories_count = Categories::where(['restaurant_id' => $id])->count();

          $menu_count = Menu::where(['restaurant_id' => $id])->count();

          $order_count = Order::where(['restaurant_id' => $id])->count();

          $review_count = Review::where(['restaurant_id' => $id])->count();

          return view('admin.pages.restaurantview',compact('restaurant','categories_count','menu_count','order_count','review_count'));
        
    }   
    
    public function reviewlist($id)    { 
        
              
        $review_list = Review::where("restaurant_id", $id)->orderBy('date')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $restaurant_id=$id; 
 

        return view('admin.pages.review_list',compact('review_list','restaurant_id'));
    } 


    public function my_restaurants()    
    {     
    
          if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
         }

         $user_id=Auth::User()->id;

         $restaurant= Restaurants::where('user_id',$user_id)->first();
         
          $types = Types::orderBy('type')->get();

         /* $restaurant= Restaurants::findOrFail($id);
          
          $categories_count = Categories::where(['restaurant_id' => $id])->count();

          $menu_count = Menu::where(['restaurant_id' => $id])->count();

          $order_count = Order::where(['restaurant_id' => $id])->count();

          $review_count = Review::where(['restaurant_id' => $id])->count();

          return view('admin.pages.restaurantview',compact('restaurant','categories_count','menu_count','order_count','review_count'));*/

          return view('admin.pages.owner_restaurantview',compact('restaurant','types'));
        
    } 

    public function owner_reviewlist()    { 
        
        
        if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        

        $user_id=Auth::User()->id;

        $restaurant= Restaurants::where('user_id',$user_id)->first();

        $restaurant_id=$restaurant['id'];

        $review_list = Review::where("restaurant_id", $restaurant_id)->orderBy('date')->get();
       

        return view('admin.pages.owner.review_list',compact('review_list','restaurant_id'));
    }   
    	
}
