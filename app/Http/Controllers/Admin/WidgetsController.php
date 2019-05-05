<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Widgets;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;
use Intervention\Image\Facades\Image; 

class WidgetsController extends MainAdminController
{
	public function __construct()
    {
		 $this->middleware('auth');	
         
    }
    public function index()
    { 	
    	if(Auth::User()->usertype!="Admin"){

            \Session::flash('flash_message', 'Access denied!');

            return redirect('admin/dashboard');
            
        }
        
        $widgets = Widgets::findOrFail('1');
        
        return view('admin.pages.widgets',compact('widgets'));
    }	 
    
    public function footer_widgets(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		$widgets->footer_widget1_title = $inputs['footer_widget1_title'];
		$widgets->footer_widget1_desc = $inputs['footer_widget1_desc'];

		$widgets->footer_widget2_title = $inputs['footer_widget2_title'];
		$widgets->footer_widget2_desc = $inputs['footer_widget2_desc'];

		$widgets->footer_widget3_title = $inputs['footer_widget3_title'];
		$widgets->footer_widget3_address = $inputs['footer_widget3_address'];
		$widgets->footer_widget3_phone = $inputs['footer_widget3_phone'];
		$widgets->footer_widget3_email = $inputs['footer_widget3_email'];  
		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }

    public function about_widgets(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		$widgets->about_title = $inputs['about_title'];
		$widgets->about_desc = $inputs['about_desc'];  
		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function socialmedialink(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->social_facebook = $inputs['social_facebook'];
		$widgets->social_twitter = $inputs['social_twitter'];		
		$widgets->social_google = $inputs['social_google'];
		$widgets->social_instagram = $inputs['social_instagram'];
		$widgets->social_pinterest = $inputs['social_pinterest'];
		$widgets->social_vimeo = $inputs['social_vimeo'];
		$widgets->social_youtube = $inputs['social_youtube'];  
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    public function need_help(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		     
		 
		$widgets->need_help_title = $inputs['need_help_title'];
		$widgets->need_help_phone = $inputs['need_help_phone'];	
		$widgets->need_help_time = $inputs['need_help_time'];
		 
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    
    
    public function advertise(Request $request)
    {  
    		 
    	$widgets = Widgets::findOrFail('1');
 
	    
	    $data =  \Input::except(array('_token')) ;
	     

	    $inputs = $request->all();
		
		$widgets->sidebar_advertise = $inputs['sidebar_advertise'];		
		 
		 
	    $widgets->save();

	    Session::flash('flash_message', 'Successfully updated!');

        return redirect()->back();
    }
    	
}
