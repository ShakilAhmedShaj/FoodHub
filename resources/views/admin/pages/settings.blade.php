@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Settings</h2>
		<a href="{{ URL::to('admin/dashboard') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
	</div>
	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	 @if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
				@endif
    <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#account" aria-controls="account" role="tab" data-toggle="tab">General Settings</a>
        </li>
        <li role="presentation">
            <a href="#homepage_settings" aria-controls="homepage_settings" role="tab" data-toggle="tab">Home Page Settings</a>
        </li>
       
        <li role="presentation">
            <a href="#other_Settings" aria-controls="other_Settings" role="tab" data-toggle="tab">Other Settings</a>
        </li>        
         
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="account">             
            {!! Form::open(array('url' => 'admin/settings','class'=>'form-horizontal padding-15','name'=>'account_form','id'=>'account_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Logo</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_logo)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_logo) }}" width="150" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_logo" class="filestyle">
                                <small class="text-muted bold">Size 190x23px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Favicon</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->site_favicon)
                                 
									<img src="{{ URL::asset('upload/'.$settings->site_favicon) }}" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="site_favicon" class="filestyle">
                                <small class="text-muted bold">Size 16x16px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Name</label>
                    <div class="col-sm-9">
                        <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Currency Symbol</label>
                    <div class="col-sm-9">
                        <input type="text" name="currency_symbol" value="{{ $settings->currency_symbol }}" class="form-control" value="" placeholder="$">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Email</label>
                    <div class="col-sm-9">
                        <input type="email" name="site_email" value="{{ $settings->site_email }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Site Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_description" class="form-control" rows="5" placeholder="A few words about site">{{ $settings->site_description }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Copyright Text</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_copyright" class="form-control" rows="5">{{ $settings->site_copyright }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                         
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="homepage_settings">             
            {!! Form::open(array('url' => 'admin/homepage_settings','class'=>'form-horizontal padding-15','name'=>'layout_settings_form','id'=>'layout_settings_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Home Slide 1</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->home_slide_image1)
                                 
									<img src="{{ URL::asset('upload/'.$settings->home_slide_image1) }}" alt="bg image" width="150">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="home_slide_image1" class="filestyle">
                                 <small class="text-muted bold">Size 1200x450px</small>
                            </div>
                        </div>
	
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Home Slide 2</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->home_slide_image2)
                                 
                                    <img src="{{ URL::asset('upload/'.$settings->home_slide_image2) }}" alt="bg image" width="150">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="home_slide_image2" class="filestyle">
                                 <small class="text-muted bold">Size 1200x450px</small>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Home Slide 3</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->home_slide_image3)
                                 
                                    <img src="{{ URL::asset('upload/'.$settings->home_slide_image3) }}" alt="bg image" width="150">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="home_slide_image3" class="filestyle">
                                 <small class="text-muted bold">Size 1200x450px</small>
                            </div>
                        </div>
    
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Page Title Background</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if($settings->page_bg_image)
                                 
                                    <img src="{{ URL::asset('upload/'.$settings->page_bg_image) }}" alt="bg image" width="150">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="page_bg_image" class="filestyle">
                                 <small class="text-muted bold">Size 1400x350px</small>
                            </div>
                        </div>
    
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Total Restaurant</label>
                    <div class="col-sm-9">
                        <input type="text" name="total_restaurant" value="{{ $settings->total_restaurant }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Total People Served</label>
                    <div class="col-sm-9">
                        <input type="text" name="total_people_served" value="{{ $settings->total_people_served }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Total Registered Users</label>
                    <div class="col-sm-9">
                        <input type="text" name="total_registered_users" value="{{ $settings->total_registered_users }}" class="form-control" value="">
                    </div>
                </div>

                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                         
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
        
        <div role="tabpanel" class="tab-pane" id="other_Settings">
            
            {!! Form::open(array('url' => 'admin/headfootupdate','class'=>'form-horizontal padding-15','name'=>'pass_form','id'=>'pass_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Header Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_header_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to header. ">{{ $settings->site_header_code }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Footer Code</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="site_footer_code" class="form-control" rows="5" placeholder="You may want to add some html/css/js code to footer. ">{{ $settings->site_footer_code }}</textarea>
                    </div>
                </div>
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">Save Changes <i class="md md-lock-open"></i></button>
                    </div>
                </div>

            {!! Form::close() !!} 
        </div>
         
    </div>
</div>
</div>

@endsection