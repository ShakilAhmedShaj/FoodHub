@extends("app")

@section('head_title', 'Change Password' .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 

<!-- Content ================================================== --> 
 <div class="container margin_60">
   
  <div class="row">
    <div class="col-md-3">

    </div>  
    <div class="col-md-6">
        <div class="box_style_2" id="order_process">
          <h2 class="inner">Change Password</h2>
          {!! Form::open(array('url' => 'change_pass','class'=>'','id'=>'myProfile','role'=>'form')) !!} 

            <div class="message">
                        <!--{!! Html::ul($errors->all(), array('class'=>'alert alert-danger errors')) !!}-->
                                    @if (count($errors) > 0)
                          <div class="alert alert-danger">
                          
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                                    
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">             
                {{ Session::get('flash_message') }}
            </div>
        @endif

          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" value="" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="form-group">
                <label>Confirm password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" value="" class="form-control" placeholder="Confirm password">
              </div>
            </div>
          </div>
           
          <hr>
           
            <button type="submit" class="btn btn-submit">Update</button>
      {!! Form::close() !!} 
        </div>
        <!-- End box_style_1 --> 
      </div>
      <!-- End col-md-6 -->


     
        
  </div>
  <!-- End row -->   
</div>
<!-- End white_bg -->

 

 
<!-- End section --> 
<!-- End Content =============================================== --> 

@endsection
