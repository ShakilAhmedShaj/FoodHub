<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('restaurant_id');
            $table->integer('item_id');             
            $table->string('item_name');             
            $table->integer('item_price')->length(4);  
            $table->integer('quantity')->length(2);
            $table->integer('created_date'); 
            $table->string('status');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_order');
    }
}
