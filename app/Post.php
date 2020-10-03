<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
	use Commentable;

    
	protected $fillable = ['title', 'body','user_id', 'name', 'category_id', 'post_img'];


    public function user(){

    	return $this->belongsTo(Post::class);
    }

    public function category(){

    	return $this->belongsTo('App\categories');
    }
}
