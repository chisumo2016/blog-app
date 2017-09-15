<?php

namespace App\Http\Controllers\Page;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller

{
    //About Me

    public function  about()
    {
        return view('pages.about');
    }

    //Contact Page
    public  function contact()
    {
        return view('pages.contact');
    }

    public  function postContact(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email',
            'subject'=>'min:3',
            'message'=>'min:10'
        ]);

        $data = array(
            'email' =>$request->email,
            'subject'=>$request->subject,
            'bodyMessage'=>$request->message
        );

        Mail::send('emails.contact', $data, function ($message) use ($data){
            $message ->from($data['email']);
            $message->to('bchisumo74@gmail.com') ;
            $message->subject($data['subject']) ;
        });

        Session::flash('success', 'Your Email was Sent !');
        return redirect()->back();
    }
}
