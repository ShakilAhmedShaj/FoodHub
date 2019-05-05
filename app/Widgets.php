<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Widgets extends Model
{
    protected $table = 'widgets';

    protected $fillable = ['about_news_title', 'about_news', 'social_media_title', 'social_media_code','contact_title','contact_address','contact_phone','contact_email','social_facebook','social_twitter','social_linkedin','social_dribbble','social_youtube','social_behance','featured_title','featured_post_limit','header_advertise','sidebar_advertise','recent_posts_title','recent_posts_limit','popular_posts_title','popular_posts_limit'];


   /* public function post()
    {
        return $this->hasMany('App\Posts', 'category_id');
    }
   */
	
	 public $timestamps = false;
    
}
