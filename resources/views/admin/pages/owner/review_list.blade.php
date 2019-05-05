@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		
		<h2>Review List</h2>
         
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
                <th>Date</th>
                <th>User Name</th>               
                <th>Email</th>
                <th class="text-center" style="width:220px">Rating</th>
                
                <th>Review</th>                           
                
            </tr>
            </thead>

            <tbody>
            @foreach($review_list as $i => $review)
            <tr>
                <td>{{ date('m-d-Y',$review->date)}}</td>
                <td>{{ \App\User::getUserFullname($review->user_id) }}</td>                
                <td>{{ \App\User::getUserInfo($review->user_id)->email }}</td>                
                <td class="text-center"> 
                    <div class="h4">
                        @for($x = 0; $x < 5; $x++)
                  
                          @if($x < \App\Review::getUserAvgReview($review->user_id))
                            <span class="fa fa-fw fa-star text-success"></span>
                          @else
                            <span class="fa fa-fw fa-star-o text-muted"></span>
                          @endif
                     
                       @endfor
                    </div>
                      
                </td>
                 
                <td>{{ $review->review_text }}</td>
               
            </tr>
           @endforeach
             
            </tbody>
        </table>
         
    </div>
    <div class="clearfix"></div>
</div>

</div>

@endsection