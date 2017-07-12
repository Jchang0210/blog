<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Tag extends Eloquent
{
	public function posts() {
		return $this->belongToMany('App/Post');
	}
}
