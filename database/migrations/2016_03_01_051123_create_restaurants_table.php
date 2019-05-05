<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('restaurant_type');                    
            $table->string('restaurant_name');
            $table->string('restaurant_slug')->nullable();
            $table->longtext('restaurant_description');
            $table->text('restaurant_address');
            $table->text('delivery_charge')->nullable(); 
            $table->string('restaurant_logo')->nullable();           
            $table->string('restaurant_bg')->nullable();
            $table->string('open_monday')->nullable();
            $table->string('open_tuesday')->nullable();
            $table->string('open_wednesday')->nullable();
            $table->string('open_thursday')->nullable();
            $table->string('open_friday')->nullable();
            $table->string('open_saturday')->nullable();
            $table->string('open_sunday')->nullable();            
            $table->integer('review_avg')->nullable();             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
