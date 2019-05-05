<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Categories;
use App\Restaurants;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class CategoriesController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function categories($id)    { 
        
              
        $categories = Categories::where("restaurant_id", $id)->orderBy('category_name')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $restaurant_id=$id;
         
        return view('admin.pages.categories',compact('categories','restaurant_id'));
    }
    
    public function addeditCategory($id)    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $restaurant_id=$id;

        return view('admin.pages.addeditCategory',compact('restaurant_id'));
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'category_name' => 'required'		         
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	    $inputs = $request->all();
		
		if(!empty($inputs['id'])){
           
            $cat = Categories::findOrFail($inputs['id']);

        }else{

            $cat = new Categories;

        }
		
		 
		$cat->restaurant_id = $inputs['restaurant_id'];
        $cat->category_name = $inputs['category_name']; 
		 
		
		 
	    $cat->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editCategory($id,$cat_id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        	     
          $cat = Categories::findOrFail($cat_id);
          
          $restaurant_id=$id;

          return view('admin.pages.addeditCategory',compact('cat','restaurant_id'));
        
    }	 
    
    public function delete($id,$cat_id)
    {
    	if(Auth::User()->usertype=="Admin" or Auth::User()->usertype=="Owner")
        {
        	
        $cat = Categories::findOrFail($cat_id);
        $cat->delete();

        \Session::flash('flash_message', 'Deleted');

        return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        
        }
    }

    public function owner_categories()    { 
        
        
         $user_id=Auth::User()->id;

         $restaurant= Restaurants::where('user_id',$user_id)->first();

         $restaurant_id=$restaurant['id'];

         $categories = Categories::where("restaurant_id", $restaurant_id)->orderBy('category_name')->get();
        
        if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
 
         
        return view('admin.pages.owner.categories',compact('categories','restaurant_id'));
    }

    public function owner_addeditCategory()    { 
         
        if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

         $user_id=Auth::User()->id;

         $restaurant= Restaurants::where('user_id',$user_id)->first();

         $restaurant_id=$restaurant['id'];

         if($restaurant_id==""){

            \Session::flash('flash_message', 'Add Restaurant');

            return redirect('admin/myrestaurants');            
        }

        return view('admin.pages.owner.addeditCategory',compact('restaurant_id'));
    }
     
    	
}
