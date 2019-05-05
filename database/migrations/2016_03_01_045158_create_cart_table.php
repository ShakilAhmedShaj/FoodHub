<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cart', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');     
            $table->integer('restaurant_id'); 
            $table->integer('item_id');            
            $table->string('item_name');
            $table->integer('item_price')->length(4);     
            $table->integer('quantity')->length(2); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
