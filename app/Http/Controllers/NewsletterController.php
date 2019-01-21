<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function create()
    {
        return view('news.partials.newsletter');
    }

    public function store(Request $request)
    {
        if ( ! Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            toastr()->success('You have subscribed successfully!');
            return redirect('newsletter');
        }
        return redirect('newsletter')->with('failure', 'Sorry! You have already subscribed ');
            
    }
}