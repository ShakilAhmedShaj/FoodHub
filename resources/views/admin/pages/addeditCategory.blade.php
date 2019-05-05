@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($cat->category_name) ? 'Edit: '. $cat->category_name : 'Add Category' }}</h2>
		
		<a href="{{ URL::to('admin/restaurants/view/'.$restaurant_id.'/categories') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
	  
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
                {!! Form::open(array('url' => array('admin/restaurants/view/'.$restaurant_id.'/categories/addcategory'),'class'=>'form-horizontal padding-15','name'=>'category_form','id'=>'category_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                
                <input type="hidden" name="restaurant_id" value="{{$restaurant_id}}">
                <input type="hidden" name="id" value="{{ isset($cat->id) ? $cat->id : null }}">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Category Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="category_name" value="{{ isset($cat->category_name) ? $cat->category_name : null }}" class="form-control">
                    </div>
                </div> 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($cat->id) ? 'Edit Category ' : 'Add Category' }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection