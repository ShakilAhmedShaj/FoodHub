<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table = 'settings';

    protected $fillable = ['site_name','currency_symbol', 'site_email', 'site_logo', 'site_favicon','site_description','site_header_code','site_footer_code','site_copyright','addthis_share_code','disqus_comment_code','facebook_comment_code','home_bg_image','total_restaurant','total_people_served','total_registered_users'];

 
	
	 public $timestamps = false;
    
}
