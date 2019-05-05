<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Restaurants;
use App\Categories;
use App\Menu;
use App\Types;
use App\Review;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\DB;

class RestaurantsController extends Controller
{
	 
    public function index(Request $request)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();

        $restaurants = DB::table('restaurants')
                           ->leftJoin('restaurant_types', 'restaurants.restaurant_type', '=', 'restaurant_types.id')                           
                           ->select('restaurants.*','restaurant_types.type')
                           //->where('restaurants.cat_id', '=', $cat->id)
                           ->orderBy('id', 'desc')
                           ->paginate(10);
        
         $restaurants->setPath($request->url()); 

         
         
        return view('pages.restaurants',compact('restaurants'));
    }

    public function restaurants_type(Request $request,$type)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();

        $restaurants = DB::table('restaurants')
                           ->leftJoin('restaurant_types', 'restaurants.restaurant_type', '=', 'restaurant_types.id')                           
                           ->select('restaurants.*','restaurant_types.type')
                           ->where('restaurant_types.id', '=', $type)
                           ->orderBy('id', 'desc')
                           ->paginate(10);
        
         $restaurants->setPath($request->url()); 

         
         
        return view('pages.restaurants',compact('restaurants'));
    }

    public function restaurants_rating(Request $request,$rating)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();

        $restaurants = DB::table('restaurants')
                           ->leftJoin('restaurant_types', 'restaurants.restaurant_type', '=', 'restaurant_types.id')                           
                           ->select('restaurants.*','restaurant_types.type')
                           ->where('restaurants.review_avg', '=', $rating)
                           ->orderBy('id', 'desc')
                           ->paginate(10);
        
         $restaurants->setPath($request->url()); 

         
         
        return view('pages.restaurants',compact('restaurants'));
    }
    

    public function restaurants_search(Request $request)    
    { 
        
              
        //$restaurants = Restaurants::orderBy('restaurant_name')->get();
        $inputs = $request->all();

       $keyword = $inputs['search_keyword'];
       $restaurants = Restaurants::SearchByKeyword($keyword)->get();

       $total_res=count($restaurants);  
         
        return view('pages.restaurants_search',compact('restaurants','total_res','keyword'));
    }
     
    public function restaurants_menu($slug)    
    {     
          $restaurant = Restaurants::where("restaurant_slug", $slug)->first();
          

           
          return view('pages.restaurants_menu',compact('restaurant'));
        
    }  
    
    public function restaurants_details($slug,Request $request)    
    {     
          $restaurant = Restaurants::where("restaurant_slug", $slug)->first();
          
          $reviews = DB::table('restaurant_review')                            
                           ->select('restaurant_review.*')
                           ->where('restaurant_review.restaurant_id', '=', $restaurant->id)
                           ->orderBy('restaurant_review.id', 'desc')
                           ->paginate(10);
        
           $reviews->setPath($request->url()); 

           $total_review = Review::where("restaurant_id", $restaurant->id)->count();
          
          return view('pages.restaurants_details',compact('restaurant','reviews','total_review'));
        
    }	 
    
    
     public function restaurant_review(Request $request)    
    {     
         
        
        $inputs = $request->all();

        $user_id=Auth::user()->id;

        $review = new Review; 

        $review->restaurant_id = $inputs['restaurant_id']; 
        $review->user_id = $user_id;       
        $review->review_text = $inputs['review_text'];
        $review->food_quality = $inputs['food_quality'];
        $review->price = $inputs['price'];
        $review->punctuality = $inputs['punctuality'];
        $review->courtesy = $inputs['courtesy'];      
        $review->date= strtotime(date('Y-m-d'));  

        $review->save();

        $food_quality=round(DB::table('restaurant_review')->where('restaurant_id', $inputs['restaurant_id'])->avg('food_quality'));

        $price=round(DB::table('restaurant_review')->where('restaurant_id', $inputs['restaurant_id'])->avg('price'));

        $punctuality=round(DB::table('restaurant_review')->where('restaurant_id', $inputs['restaurant_id'])->avg('punctuality'));

        $courtesy=round(DB::table('restaurant_review')->where('restaurant_id', $inputs['restaurant_id'])->avg('courtesy'));

        $total_avg=round($food_quality+$price+$punctuality+$courtesy)/4;

        $restaurant_obj = Restaurants::findOrFail($inputs['restaurant_id']);

        $restaurant_obj->review_avg = $total_avg;  
        $restaurant_obj->save();  

          return \Redirect::back();
    }   
    	
}
