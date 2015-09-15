<?php

namespace todoparrot\Http\Controllers;

use Illuminate\Http\Request;

use todoparrot\Http\Requests;
use todoparrot\Http\Controllers\Controller;

use todoparrot\Http\Requests\ContactFormRequest;

class AboutController extends Controller
{
    public function create()
    {
    	return view('about.contact');
    }

    public function store(ContactFormRequest $request)
    {
    	\Mail::send('emails.contact',
    		array(
    			'name' => $request->get('name'),
    			'email' => $request->get('email'),
    			'user_message' => $request->get('message')
    			), function($message)
    		{
    			$message->from('jason@example.com');
    			$message->to('rosoroyroy@gmail.com', 'Admin')
    				->subject('TODOParrot Feedback');
    		});

    	return \Redirect::route('contact')
    		->with('message', 'Thank you for contacting us!');
    }
}
