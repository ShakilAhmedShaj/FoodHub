<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Menu;
use App\Categories;
use App\Restaurants;
use App\Order;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 


class MenuController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');
		  
		parent::__construct(); 	
		  
    }
    public function menulist($id)    { 
        
              
        $menu = Menu::where("restaurant_id", $id)->orderBy('menu_name')->get();
        
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $restaurant_id=$id;
         
        return view('admin.pages.menu',compact('menu','restaurant_id'));
    }
    
    public function addeditmenu($id)    { 
         
        if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $categories = Categories::where("restaurant_id", $id)->orderBy('category_name')->get();

        $restaurant_id=$id;

        return view('admin.pages.addeditmenu',compact('categories','restaurant_id'));
    }
    
    public function addnew(Request $request)
    { 
    	
    	$data =  \Input::except(array('_token')) ;
	    
	    $rule=array(
		        'menu_cat' => 'required',
                'menu_name' => 'required',
                'price' => 'required'		         
		   		 );
	    
	   	 $validator = \Validator::make($data,$rule);
 
        if ($validator->fails())
        {
                return redirect()->back()->withErrors($validator->messages());
        } 
	    $inputs = $request->all();
		
		if(!empty($inputs['id'])){
           
            $menu = Menu::findOrFail($inputs['id']);

        }else{

            $menu = new Menu;

        }
		
        //Logo image
        $menu_image = $request->file('menu_image');
         
        if($menu_image){
            
             \File::delete(public_path() .'/upload/menu/'.$menu->menu_image.'-b.jpg');
            \File::delete(public_path() .'/upload/menu/'.$menu->menu_image.'-s.jpg');
            
            $tmpFilePath = 'upload/menu/';          
             
            $hardPath = substr($inputs['menu_name'],0,100).'_'.time();
            
            $img = Image::make($menu_image);

            $img->save($tmpFilePath.$hardPath.'-b.jpg');
            $img->fit(100, 100)->save($tmpFilePath.$hardPath. '-s.jpg');

            $menu->menu_image = $hardPath;
             
        }
		 
		$menu->restaurant_id = $inputs['restaurant_id'];
        $menu->menu_cat = $inputs['menu_cat'];
        $menu->menu_name = $inputs['menu_name'];
        $menu->description = $inputs['description'];
        $menu->price = $inputs['price']; 
		 
		
		 
	    $menu->save();
		
		if(!empty($inputs['id'])){

            \Session::flash('flash_message', 'Changes Saved');

            return \Redirect::back();
        }else{

            \Session::flash('flash_message', 'Added');

            return \Redirect::back();

        }		     
        
         
    }     
    
    public function editmenu($id,$menu_id)    
    {     
    
    	  if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          


          $menu = Menu::findOrFail($menu_id);
          
          $categories = Categories::where("restaurant_id", $id)->orderBy('category_name')->get();

          $restaurant_id=$id;

          return view('admin.pages.addeditmenu',compact('menu','categories','restaurant_id'));
        
    }	 
    
    public function delete($menu_id)
    {
         
    	if(Auth::User()->usertype=="Admin" or Auth::User()->usertype=="Owner")
        {
             
             $order_obj = Order::where('item_id',$menu_id)->delete();   

             $menu = Menu::findOrFail($menu_id);
             $menu->delete();

            \Session::flash('flash_message', 'Deleted');

            return redirect()->back();
        }
        else
        {
            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        
        }

    }

    public function owner_menu()    
    { 
        
        
        $user_id=Auth::User()->id;

        $restaurant= Restaurants::where('user_id',$user_id)->first();

        $restaurant_id=$restaurant['id'];

        $menu = Menu::where("restaurant_id", $restaurant_id)->orderBy('menu_name')->get();
        
        if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

 
        return view('admin.pages.owner.menu',compact('menu','restaurant_id'));
   
    }

    public function owner_addeditmenu()    { 

        if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }

        $user_id=Auth::User()->id;

        $restaurant= Restaurants::where('user_id',$user_id)->first();

        $restaurant_id=$restaurant['id'];

        $categories = Categories::where("restaurant_id", $restaurant_id)->orderBy('category_name')->get();

         

        return view('admin.pages.owner.addeditmenu',compact('categories','restaurant_id'));
    }
    
    public function owner_editmenu($menu_id)    
    {     
    
          if(Auth::User()->usertype!="Owner"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
          
        $user_id=Auth::User()->id;

        $restaurant= Restaurants::where('user_id',$user_id)->first();

        $restaurant_id=$restaurant->id;

          $menu = Menu::findOrFail($menu_id);
          
          $categories = Categories::where("restaurant_id", $restaurant_id)->orderBy('category_name')->get();

           

          return view('admin.pages.owner.addeditmenu',compact('menu','categories','restaurant_id'));
        
    } 
    	
}
