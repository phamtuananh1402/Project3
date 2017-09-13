<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackFormRequest;
use App\Mail\FeedbackEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function create()
    {
        return view('about.feedback');
    }

    public function store(FeedbackFormRequest $request)
    {

        Mail::send(new FeedbackEmail());

        return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

    }
}

