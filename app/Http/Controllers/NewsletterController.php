<?php

namespace App\Http\Controllers;
use App\Newsletter;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function create(){
        return view('home.index');
    }

    public function store(Request $request){
        // dd(request()->all());
        $data = request()->validate([
            'email'=> 'nullable|email',
            
        ]);

        $newsletter = new Newsletter;
        $newsletter->email = $request->input('email');
        $newsletter->save();

        // Mail::to('pranjalpandey92@gmail.com')->send(new ContactFormMail($data));
        
        // return redirect('contact');
        return back()->with('success', 'you are now subscribed, We will contact you shortly!');
    }
}
