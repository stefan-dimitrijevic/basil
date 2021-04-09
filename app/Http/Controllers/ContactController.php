<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use App\Mail\ContactAdmin;
use Illuminate\Http\Request;

class ContactController extends BasicController
{
    public function index()
    {
        return view('pages.contact', $this->data);
    }

    public function store(SendEmailRequest $request)
    {
        $this->data['message'] = $request->get('message');
        try {
            \Mail::send(new ContactAdmin($this->data));
            return redirect()->route('contact')->with('success', 'Message sent! Thank you.');
        } catch (\Exception $e) {
            return redirect()->route('contact')->with('error', 'There was a problem with sending a message. Please, try again later.');
        }
    }
}
