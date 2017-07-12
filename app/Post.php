<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
	public function category() {
		return $this->belongsTo('App\Category');
    }

    public function tag() {
    	return $this->belongsToMany('App\Tag');
    }
}
