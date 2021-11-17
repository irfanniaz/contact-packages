<?php

namespace Auworldteck\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auworldteck\Contact\Models\Contact;
use Auworldteck\Contact\mail\ContactMailable;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    
    public function index()
    {
    return view('contact::contact');

    }

    public function send(Request $request)
    {
        Mail::to(config('contact.send_email_to'))->send(new ContactMailable($request->message,$request->name)); 
        Contact::create($request->all());   
        return redirect(route('contact'));

    }
}
