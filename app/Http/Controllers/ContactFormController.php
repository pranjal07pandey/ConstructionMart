<?php

namespace App\Http\Controllers;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactFormController extends Controller
{
    public function create(){
        return view('home.contact');
    }

    public function store(Request $request){
        // dd(request()->all());
        $data = request()->validate([
            'name' =>'required',
            'email'=> 'nullable|email',
            'subject'=> 'required',
            'phone' =>'required',
            'msg' => 'required'
        ]);

        Mail::to('pranjalpandey92@gmail.com')->send(new ContactFormMail($data));
        
        // return redirect('contact');
        return back()->with('success', 'Your message has been sent. We will contact you shortly!');
    }
}
