<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class BlogController extends Controller
{
	public function getIndex() {
		$post = Post::paginate(10);

    	return view('blog.index')->withPosts($post);
    }

    public function getSingle($slug) {

    	$post = Post::raw()->findOne(['slug'=>$slug]);

    	return view('blog.single')->withPosts($post);

    }
}
