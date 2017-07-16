<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validate the data
        $this->validate($request, array(
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'tag' => 'max:50',
            'slug' => 'required|alphadash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));

        // store in the database
        $post = New Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category;
        // $post->tag_id = $request->tag;

        $post->save();

        if (isset($request->tag)) {
            $post->tag()->sync($request->tag, false);
        } else {
            $post->tag()->sync(array());
        }


        // session
        Session::flash('success', 'the blog post was success save!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPosts($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit')->withPosts($post)->withCategories($categories)->withTags($tags);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // store in the database
        $post = Post::find($id);

        $this->validate($request, array(
            'title' => 'required|max:50',
            'category' => 'required|max:50',
            'tag' => 'max:50',
            'slug' => $request->input('slug') == $post->slug ? 'required|alphadash|min:5|max:255' : 'required|alphadash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ));

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category');
        // $post->tag_id = $request->input('tag');

        $post->save();

        if (isset($request->tag)) {
            $post->tag()->sync($request->tag);
        } else {
            $post->tag()->sync(array());
        }

        // session
        Session::flash('success', 'the blog post was success updated!');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tag()->detach();

        $post->delete();

        Session::flash('success', 'the blog post was success deleted!');

        return redirect()->route('posts.index');

    }
}
