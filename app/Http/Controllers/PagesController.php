<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller
{
    public function getIndex() {
    	$posts = Post::orderBy('create_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }

    public function getAbout() {
        return view('pages.about');
    }

    public function getContact() {
        return view('pages.contact');
    }

    public function postContact(Request $request) {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'subject' => 'required|min:5',
    		'message' => 'required|min:10',
    	]);

    	$data = array(
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'bodyMessage' => $request->message,
    	);

    	Mail::send('emails.contact', $data, function($message) use ($data) {
    		$message->from($data['email']);
    		$message->to('johnnychang0210@gmail.com');
    		$message->subject($data['subject']);
    	});

    	// session
        Session::flash('success', 'Your email was sent !');

        // redirect to another page
        return redirect('/');

    }
}
