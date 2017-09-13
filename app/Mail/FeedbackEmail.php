<?php

namespace App\Mail;

use App\Http\Requests\FeedbackFormRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class FeedbackEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(FeedbackFormRequest $request)
    {
        return $this->from('tuananhpham1402@gmail.com')->to('kata.love14@yahoo.com')
            ->view('emails.feedback', array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ));
    }
}
