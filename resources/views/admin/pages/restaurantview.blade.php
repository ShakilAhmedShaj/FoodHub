@extends("admin.admin_app")

@section("content")

<div id="main">
    <div class="page-header">
        <h2>{{$restaurant->restaurant_name}} Overview</h2>

        <a href="{{ URL::to('admin/restaurants') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> Back</a>
    </div>
    
 
<div class="row">
    
    @if(Auth::user()->usertype=='Admin')
        
        <a href="{{ URL::to('admin/restaurants/view/'.$restaurant->id.'/categories') }}">
        <div class="col-sm-6 col-md-3">
        <div class="panel panel-orange panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Categories</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                 {{$categories_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-folder fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    @endif
     
     
    <a href="{{ URL::to('admin/restaurants/view/'.$restaurant->id.'/menu') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-green panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Menu</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                 {{$menu_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-coffee fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </a>

    <a href="{{ URL::to('admin/restaurants/view/'.$restaurant->id.'/orderlist') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-grey panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Order</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                 {{$order_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-cart-plus fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </a>

    <a href="{{ URL::to('admin/restaurants/view/'.$restaurant->id.'/review') }}">
    <div class="col-sm-6 col-md-3">
        <div class="panel panel-primary panel-shadow">
            <div class="media">
                <div class="media-left">
                    <div class="panel-body">
                        <div class="width-100">
                            <h5 class="margin-none" id="graphWeek-y">Review</h5>

                            <h2 class="margin-none" id="graphWeek-a">
                                 {{$review_count}}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    <div class="pull-right width-150">
                        <i class="fa fa-star-half-o fa-4x" style="margin: 8px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </a>
    
     
</div>
 
</div>

@endsection