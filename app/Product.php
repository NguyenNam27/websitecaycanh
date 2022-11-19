<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false; //set time to false
    protected $fillable = [
    	'product_name', 'product_slug','product_quantity','category_id','brand_id','product_desc','product_content','product_price','product_image','product_hot','product_status'
    ];
    protected $primaryKey = 'product_id';
 	protected $table = 'tbl_product';
}
