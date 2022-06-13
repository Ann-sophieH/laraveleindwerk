<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function create(){
        return view('contactformulier');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
       // $data = $request->all();
        Mail::to(request('email'))->send(new Contact($data));
        return redirect()->back()->with('success_message', 'we received your message successfully and we will get back to you soon!');
       // return redirect()->back();
    }
    public function contact(){

        return view('contact');
    }
}
