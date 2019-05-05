<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<style>
*{margin:0;padding:0}
body{background:#FFF;height:100%;width:100%;font-weight:400;margin:0;padding:0;font-size:14px;font-family:'Open Sans',Arial,Helvetica,sans-serif}
</style>
<div style="margin:0 auto;padding:0;">
<header style="background: rgba(80, 164, 47, 0.98);box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.41);display: inline-block;line-height: 0;position: relative;width: 100%;z-index: 999;margin-bottom:20px;">
    <div style="width: 1100px;margin:0 auto;">
      <div style="margin: 12px 0;text-align:center;color:#fff;font-size:16px;"> <a href="{{ url('/') }}" target="_blank"><img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" ></a> </div>      
    </div>
</header>
<div style="width: 1100px;margin:0 auto;">    
<h2 style="color: #565656;font-size: 14px;font-weight: 600;padding:5px 10px;text-align:left;">Hi,</h2>
<p style="padding:0 10px;margin: 0 0 10px;line-height:22px;color:#444">New order placed by {{$name}}!</p> 
 
<div style="clear:both"></div>        
<div style="float: left;margin:0px 0;padding: 8px 0; width:1100px;">					
	<table height="100%" width="100%">
	  <thead>
		<tr style="border-bottom:1px solid #ccc">                      
		  <th style="width:40%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">Item</th>
		  <th style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">Qty</th>
		  <th style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">Price</th>
		  <th style="width:38%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">Subtotal</th>
		</tr>
	  </thead>
	  <div style="clear:both"></div>
	  <tbody>
	  	<?php $sum=0;?>
	  	@foreach($order_list as $order)
		<tr style="border-bottom:1px solid #ccc">                      
		  <td style="width:40%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">{{$order->item_name}}</td>
		  <td style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">{{$order->quantity}}</td>
		  <td style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">{{getcong('currency_symbol')}}{{ \App\Menu::getMenunfo($order->item_id)->price }}</td>
		  <td style="width:38%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">	{{getcong('currency_symbol')}}{{$order->item_price}}
		  	<?php $sum=$sum+$order->item_price;?>
		</td>

		</tr>
		@endforeach
		<tr style="border-bottom:1px solid #ccc">                      
		  <td style="width:40%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">&nbsp;</td>
		  <td style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">&nbsp;</td>
		  <td style="width:12%;color:#565656;text-align:left;padding:10px;vertical-align: middle;">&nbsp;</td>
		  <td style="width:38%;color:#565656;text-align:left;padding:10px;vertical-align: middle;"><b>Amount Payable:$ {{$sum}}</b>
		  </td>
		</tr>							
	  </tbody>				  
	</table>
	 	 
  </div>
</div>
<div style="clear:both"></div>
<div style="background:#444;padding: 20px 0;margin-top:30px;text-transform: uppercase;">
<div style="width: 1100px;margin:0 auto;">
  <p style="color: #fff;font-size: 13px;margin: 0;text-align: center;text-transform: none;">Copyright © {{date('Y')}} {{getcong('site_name')}}. All rights reserved.</p>
</div>
</div>
</body>
</html>
 