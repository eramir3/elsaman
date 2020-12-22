<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function mail() {

        $mail = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'telephone' => '',
            'message' => 'required|min:3',
        ]);

        Mail::to($mail['email'])->send(new ContactMail($mail));

        return view('contact'); 
    }
}
