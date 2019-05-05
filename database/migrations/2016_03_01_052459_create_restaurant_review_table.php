<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('restaurant_review', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('restaurant_id');
            $table->integer('user_id');
            $table->longtext('review_text');             
            $table->integer('food_quality')->length(1);             
            $table->integer('price')->length(1);  
            $table->integer('punctuality')->length(1);
            $table->integer('courtesy')->length(1);
            $table->integer('date'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_review');
    }
}
