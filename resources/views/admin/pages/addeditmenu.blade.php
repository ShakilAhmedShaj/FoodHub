@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($menu->menu_name) ? 'Edit: '. $menu->menu_name : 'Add Menu' }}</h2>
		
		<a href="{{ URL::to('admin/restaurants/view/'.$restaurant_id.'/menu') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
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
                {!! Form::open(array('url' => array('admin/restaurants/view/'.$restaurant_id.'/menu/addmenu'),'class'=>'form-horizontal padding-15','name'=>'menu_form','id'=>'menu_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                
                <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                <input type="hidden" name="id" value="{{ isset($menu->id) ? $menu->id : null }}">
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Menu category</label>
                    <div class="col-sm-4">
                        <select id="basic" name="menu_cat" class="selectpicker show-tick form-control">
                            <option value="">Select Type</option>
                            
                            @foreach($categories as $i => $category)    
                                @if(isset($menu->menu_cat) && $menu->menu_cat==$category->id)  
                                    <option value="{{$category->id}}" selected >{{$category->category_name}}</option>
                                     
                                @else
                                <option value="{{$category->id}}">{{$category->category_name}}</option> 
                                @endif                          
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Menu Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="menu_name" value="{{ isset($menu->menu_name) ? $menu->menu_name : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Sort Description</label>
                      <div class="col-sm-9">
                        <input type="text" name="description" value="{{ isset($menu->description) ? $menu->description : null }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Price</label>
                      <div class="col-sm-9">
                         
                        <input id="touch-spin-2" data-toggle="touch-spin" data-min="-1000000" data-max="1000000" data-prefix="$" data-step="1" type="text" value="{{ isset($menu->price) ? $menu->price : null }}" name="price" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">Menu Image</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($menu->menu_image))
                                 
                                    <img src="{{ URL::asset('upload/menu/'.$menu->menu_image.'-s.jpg') }}" width="100" alt="person">
                                @endif
                                                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="menu_image" class="filestyle"> 
                            </div>
                        </div>
    
                    </div>
                </div> 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($menu->id) ? 'Edit Menu ' : 'Add Menu' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection