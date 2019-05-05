@extends("admin.admin_app")

@section("content")

<div id="main">
    <div class="page-header">
        <h2> {{ isset($restaurant->restaurant_name) ? 'Edit: '. $restaurant->restaurant_name : 'Add Restaurant' }}</h2>
        
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
   
    <div class="panel panel-default">
            <div class="panel-body">
                {!! Form::open(array('url' => array('admin/restaurants/addrestaurant'),'class'=>'form-horizontal padding-15','name'=>'category_form','id'=>'category_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($restaurant->id) ? $restaurant->id : null }}">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Restaurant Type</label>
                    <div class="col-sm-9">
                        <select id="basic" name="restaurant_type" class="selectpicker show-tick form-control">
                            <option value="">Select Type</option>
                            
                            @foreach($types as $i => $type)    
                                @if(isset($restaurant->restaurant_type) && $restaurant->restaurant_type==$type->id)  
                                    <option value="{{$type->id}}" selected >{{$type->type}}</option>
                                     
                                @else
                                <option value="{{$type->id}}">{{$type->type}}</option> 
                                @endif                          
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Restaurant Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="restaurant_name" value="{{ isset($restaurant->restaurant_name) ? $restaurant->restaurant_name : null }}" class="form-control">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Restaurant Slug</label>
                    <div class="col-sm-9">
                        <input type="text" name="restaurant_slug" value="{{ isset($restaurant->restaurant_slug) ? $restaurant->restaurant_slug : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <textarea name="restaurant_address" id="restaurant_address" cols="60" rows="3" class="form-control">{{ isset($restaurant->restaurant_address) ? $restaurant->restaurant_address : null }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="restaurant_description" id="restaurant_description" cols="30" rows="8" class="summernote">{{ isset($restaurant->restaurant_description) ? $restaurant->restaurant_description : null }}</textarea>
                    </div>
                </div>
               
                 <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Restaurant Logo</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($restaurant->restaurant_logo))
                                 
                                    <img src="{{ URL::asset('upload/restaurants/'.$restaurant->restaurant_logo.'-s.jpg') }}" width="100" alt="person">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="restaurant_logo" class="filestyle"> 
                            </div>
                        </div>
    
                    </div>
                </div>
                
                <h4>Opening time</h4> 

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Monday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_monday" value="{{ isset($restaurant->open_monday) ? $restaurant->open_monday : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Tuesday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_tuesday" value="{{ isset($restaurant->open_tuesday) ? $restaurant->open_tuesday : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Wednesday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_wednesday" value="{{ isset($restaurant->open_wednesday) ? $restaurant->open_wednesday : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Thursday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_thursday" value="{{ isset($restaurant->open_thursday) ? $restaurant->open_thursday : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Friday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_friday" value="{{ isset($restaurant->open_friday) ? $restaurant->open_friday : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Saturday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_saturday" value="{{ isset($restaurant->open_saturday) ? $restaurant->open_saturday : null }}" class="form-control">
                    </div>
                </div>  
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Sunday</label>
                    <div class="col-sm-9">
                        <input type="text" name="open_sunday" value="{{ isset($restaurant->open_sunday) ? $restaurant->open_sunday : null }}" class="form-control">
                    </div>
                </div>  
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">{{ isset($restaurant->id) ? 'Edit Restaurant ' : 'Add Restaurant' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection