<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table='tbl_posts';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['title','slug','brand_id','short_description','content','image','key_word','post_status','created_at','updated_at'];

}
