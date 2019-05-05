@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> Widgets</h2>
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
            <a href="#footer_widgets" aria-controls="footer_widgets" role="tab" data-toggle="tab">Footer Widgets</a>
        </li>
        <li role="presentation">
            <a href="#about_widget" aria-controls="about_widget" role="tab" data-toggle="tab">About Us Page</a>
        </li>        
        <li role="presentation">
            <a href="#followus" aria-controls="followus" role="tab" data-toggle="tab">Social Links</a>
        </li>
        <li role="presentation">
            <a href="#need_help" aria-controls="need_help" role="tab" data-toggle="tab">Need Help?</a>
        </li>               
       
    </ul>

    <!-- Tab panes -->
    <div class="tab-content tab-content-default">
        <div role="tabpanel" class="tab-pane active" id="footer_widgets">             
            {!! Form::open(array('url' => 'admin/footer_widgets','class'=>'form-horizontal padding-15','name'=>'about_contact_widgets_form','id'=>'about_contact_widgets_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                  
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 1 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget1_title" value="{{ $widgets->footer_widget1_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 1 Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget1_desc" class="form-control" rows="5" placeholder="A few words about site">{{ $widgets->footer_widget1_desc }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 2 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget2_title" value="{{ $widgets->footer_widget2_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 2 Description</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget2_desc" class="form-control" rows="5" placeholder="A few words about site">{{ $widgets->footer_widget2_desc }}</textarea>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 3 Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget3_title" value="{{ $widgets->footer_widget2_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 3 Address</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="footer_widget3_address" class="form-control" rows="5" placeholder="A few words about site">{{ $widgets->footer_widget3_address }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 3 Phone</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget3_phone" value="{{ $widgets->footer_widget3_phone }}" class="form-control" value="">
                    </div>
                </div>  
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Widget 3 Email</label>
                    <div class="col-sm-9">
                        <input type="text" name="footer_widget3_email" value="{{ $widgets->footer_widget3_email }}" class="form-control" value="">
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
        <div role="tabpanel" class="tab-pane" id="about_widget">             
            {!! Form::open(array('url' => 'admin/about_widgets','class'=>'form-horizontal padding-15','name'=>'about_contact_widgets_form','id'=>'about_contact_widgets_form','role'=>'form','enctype' => 'multipart/form-data')) !!}
                
                  
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">About Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="about_title" value="{{ $widgets->about_title }}" class="form-control" value="">
                    </div>
                </div>                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">About Site</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="about_desc" class="summernote" rows="5" placeholder="A few words about site">{{ $widgets->about_desc }}</textarea>
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
        <div role="tabpanel" class="tab-pane" id="followus">
            
            {!! Form::open(array('url' => 'admin/socialmedialink','class'=>'form-horizontal padding-15','name'=>'socialmedialink_form','id'=>'socialmedialink_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Facebook URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_facebook" value="{{ $widgets->social_facebook }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Twitter URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_twitter" value="{{ $widgets->social_twitter }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Google Plus URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_google" value="{{ $widgets->social_google }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Instagram URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_instagram" value="{{ $widgets->social_instagram }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Pinterest URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_pinterest" value="{{ $widgets->social_pinterest }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Vimeo URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_vimeo" value="{{ $widgets->social_vimeo }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Youtube URL</label>
                    <div class="col-sm-9">
                        <input type="text" name="social_youtube" value="{{ $widgets->social_youtube }}" class="form-control" value="">
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
        
        <div role="tabpanel" class="tab-pane" id="need_help">
            
            {!! Form::open(array('url' => 'admin/need_help','class'=>'form-horizontal padding-15','name'=>'need_help_form','id'=>'need_help_form','role'=>'form')) !!}
                
                 
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Need Help Title</label>
                    <div class="col-sm-9">
                        <input type="text" name="need_help_title" value="{{ $widgets->need_help_title }}" class="form-control" value="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Phone</label>
                    <div class="col-sm-9"> 
                        <input type="text" name="need_help_phone" value="{{ $widgets->need_help_phone }}" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Time</label>
                    <div class="col-sm-9">
                        <input type="text" name="need_help_time" value="{{ $widgets->need_help_time }}" class="form-control" value="">
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