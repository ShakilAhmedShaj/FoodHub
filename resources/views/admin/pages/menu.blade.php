@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<div class="pull-right">
			<a href="{{URL::to('admin/restaurants/view/'.$restaurant_id.'/menu/addmenu')}}" class="btn btn-primary">Add <i class="fa fa-plus"></i></a>
		</div>
		<h2>Menu Items</h2>
        <a href="{{ URL::to('admin/restaurants/view/'.$restaurant_id) }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back Restaurant</a>
	</div>
	@if(Session::has('flash_message'))
				    <div class="alert alert-success">
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
				        {{ Session::get('flash_message') }}
				    </div>
	@endif
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>                           
                <th class="text-center width-100">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($menu as $i => $item)
            <tr>
                <td>{{ $item->menu_name }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    @if($item->menu_image)
                                 
                    <img src="{{ URL::asset('upload/menu/'.$item->menu_image.'-s.jpg') }}" width="80" class="img-circle border-white" alt="menu">

                   @else
                    <img src="{{ URL::asset('upload/menu_img_s.png') }}" width="80" class="img-circle border-white"/>
                   @endif
                </td>                
                <td class="text-center">
                <a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/menu/addmenu/'.$item->id) }}" class="btn btn-default btn-rounded"><i class="md md-edit"></i></a>
                <a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/menu/delete/'.$item->id) }}" class="btn btn-default btn-rounded" onclick="return confirm('Are you sure? You will not be able to recover this.')"><i class="md md-delete"></i></a>
            </td>
                
            </tr>
           @endforeach
             
            </tbody>
        </table>
         
    </div>
    <div class="clearfix"></div>
</div>

</div>

@endsection