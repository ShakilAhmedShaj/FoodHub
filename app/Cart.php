<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = ['item_name', 'item_price','quantity'];


	public $timestamps = false;
 
	 
}
