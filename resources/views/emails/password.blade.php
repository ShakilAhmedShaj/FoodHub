<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<style>
body {
	font-size: 14px;
	font-family: Arial, Helvetica, sans-serif;
}
}
</style>
<body>
<table border="0" cellpadding="0" cellspacing="0" width="60%" style="margin:0 auto;border:1px solid rgba(0, 0, 0, 0.2);padding:20px;">
 <tr style="border:0">
  <td style="text-align:center">   
   <a href="{{ url('/') }}" target="_blank"><img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="" style="width: 150px;height: 150px;"></a>
  </td>
 </tr>
 <tr style="border:0">
  <td>
   Hi,
  </td>
 </tr>
 <tr>
  <td style="padding: 20px 0 30px 0;line-height:22px;">
  Someone recently requested a password change for your account. 
If this was you, you can set a new password by clicking the link below:
  </td>
 </tr>
 <tr>
  <td style="text-align:center; margin:10px auto;float:left;width:100%;line-height:48px;">
   <a href="{{ $url }}" style="font-size: 15px;margin-bottom:10px;text-align: center;background: #007ee6;color: #fff;border-radius: 6px;text-decoration:none;padding:15px 30px;">Reset Password</a>
  </td>
 </tr>
 <tr>
  <td style="line-height:20px">
   Thanks!
   <br />- {{getcong('site_name')}}
  </td>
 </tr>
</table>
 <p style="font-size: 13px;text-align: right;margin-top: 10px;position: relative;right: 40.5%;">&copy; {{getcong('site_name')}}
  </td></p>
</body>
</html>

