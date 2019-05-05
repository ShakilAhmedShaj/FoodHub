@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		
		<h2>Order List</h2>
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
         
        <table id="order_data_table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Date</th>
                <th>User Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Address</th>
                <th>Menu Name</th>
                <th>Quantity</th>
                <th>Item Price</th>
                <th>Total Price</th>
                <th>Status</th>                           
                <th class="text-center width-100">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($order_list as $i => $order)
            <tr>
                <td>{{ date('m-d-Y',$order->created_date)}}</td>
                <td>{{ \App\User::getUserFullname($order->user_id) }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->mobile }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->email }}</td>
                <td>{{ \App\User::getUserInfo($order->user_id)->address }}</td>
                <td>{{ $order->item_name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{getcong('currency_symbol')}}{{ \App\Menu::getMenunfo($order->item_id)->price }}</td>
                <td>{{getcong('currency_symbol')}}{{ $order->item_price }}</td>
                <td>{{ $order->status }}</td>
                <td class="text-center">
                <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Actions <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                    <li><a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/orderlist/'.$order->id.'/Pending') }}"><i class="md md-lock"></i> Pending</a></li>
                                    <li><a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/orderlist/'.$order->id.'/Processing') }}"><i class="md md-loop"></i> Processing</a></li>
                                    <li><a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/orderlist/'.$order->id.'/Completed') }}"><i class="md md-done"></i> Completed</a></li>
                                    <li><a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/orderlist/'.$order->id.'/Cancel') }}"><i class="md md-cancel"></i> Cancel</a></li>
                                    <li><a href="{{ url('admin/restaurants/view/'.$restaurant_id.'/orderlist/'.$order->id) }}"><i class="md md-delete"></i> Delete</a></li>
                                </ul>
                            </div> 
                
            </td>
                
                 
            </tr>
           @endforeach
             
            </tbody>
        </table>
         <script type="text/javascript">
            $(document).ready(function() {
            
                $('#order_data_table').dataTable({
                    "order": [[ 0, "desc" ]]
                });

            } );
         </script>
    </div>
    <div class="clearfix"></div>
</div>

</div>

@endsection