<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Category extends Eloquent
{
	// protected $table = "categories";

    public function posts() {
    	return $this->hasMany('App\Post');
    }
}
