<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    use HasFactory;
    public $timestamps = false; //set time to false
    protected $fillable = [
        'title', 'short_description','content','key_words','introduce_status',
    ];
    protected $primaryKey = 'id ';
    protected $table = 'tbl_introduces';
}
