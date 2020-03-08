<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
class MailSend extends Controller
{
    public function mailsend()
    {
        $details = [
            'title' => 'Title: Fast Motors Workshop',
            'body' => 'Body: This is for testing email using smtp'
        ];

        Mail::to('bernardawino@gmail.com')->send(new \App\Mail\SendMail($details));
        return view('emails.thanks');
    }
}
