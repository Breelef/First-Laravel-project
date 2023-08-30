<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $directory = "/images/";

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'content',
        'path'


    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags (){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public static function scopeLatest($query){

        return $query->orderBy('id', 'desc');


    }


    public function getPathAttribute($value){
        return $this->directory . $value;
    }
}
