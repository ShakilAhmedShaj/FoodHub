<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');                
            $table->string('site_name');
            $table->string('currency_symbol');
            $table->string('site_email');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('site_description')->nullable();
            $table->text('site_header_code')->nullable();
            $table->text('site_footer_code')->nullable();
            $table->string('site_copyright')->nullable();
            $table->text('addthis_share_code')->nullable();
            $table->text('disqus_comment_code')->nullable();
            $table->text('facebook_comment_code')->nullable();             
            $table->string('home_slide_image1')->nullable();
            $table->string('home_slide_image2')->nullable();
            $table->string('home_slide_image3')->nullable();
            $table->string('page_bg_image')->nullable();
            $table->integer('total_restaurant')->nullable(); 
            $table->integer('total_people_served')->nullable();
            $table->integer('total_registered_users')->nullable();
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
