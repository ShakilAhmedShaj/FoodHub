@extends("app")

@section('head_title', getcong_widgets('about_title') .' | '.getcong('site_name') )

@section('head_url', Request::url())

@section("content")
 
<div class="sub-banner" style="background:url({{ URL::asset('upload/'.getcong('page_bg_image')) }}) no-repeat center top;">
    <div class="overlay">
      <div class="container">
        <h1>{{getcong_widgets('about_title')}}</h1>
      </div>
    </div>
  </div>
 
 <div class="what-we-do">
  <div class="container about_block">
  
    <div class="col-md-12">

        {!!getcong_widgets('about_desc')!!}
       
     
    </div>
   
  </div>
</div>
 

@endsection
