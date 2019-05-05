@extends("app")

@section('head_title', 'Contact Us | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
 <div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>Contact Us</h1>
      </div>
    </div>
  </div>

   
<div class="what-we-do">
  <div class="container contact_block">
    <div class="contact-form">
      <div class="col-sm-6">                
         
         {!! Form::open(array('url' => 'contact_send','class'=>'','id'=>'contact_form','role'=>'form')) !!} 
          
          <div class="message">
                         
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

          <div class="alert alert-success fade in">
              
             {{ Session::get('flash_message') }}
           </div>

             
        @endif      

          <ul class="row">
            <li class="col-sm-6">
              <label class="font-montserrat">Your Name <span class="required">*</span>
                <input type="text" class="form-control" name="name" id="name" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat">Your Email <span class="required">*</span>
                <input type="text" class="form-control" name="email" id="email" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat">Phone 
                <input type="text" class="form-control" name="phone" id="phone" placeholder="">
              </label>
            </li>
            <li class="col-sm-6">
              <label class="font-montserrat">Subject
                <input type="text" class="form-control" name="subject" id="subject" placeholder="">
              </label>
            </li>
            <li class="col-sm-12">
              <label class="font-montserrat">Message
                <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
              </label>
            </li>
            
            <li class="col-sm-8">
              <button type="submit" value="submit" class="btn font-montserrat" id="btn_submit" onClick="proceed();">Submit</button>
            </li>
          </ul>
        {!! Form::close() !!}
      </div>
    <div class="col-sm-6">
      <h5>Contact Info</h5>          
          <div class="loc-info">
            <p><i class="fa fa-map-marker"></i>{{getcong_widgets('footer_widget3_address')}}</p>
            <p><i class="fa fa-phone"></i> {{getcong_widgets('footer_widget3_phone')}}</p>
             
            <p><i class="fa fa-envelope-o"></i><a href="mailto:{{getcong_widgets('footer_widget3_email')}}">{{getcong_widgets('footer_widget3_email')}}</a></p>
          </div>
      </div>
      </div>
    </div>    
  </div>

   
 
@endsection
