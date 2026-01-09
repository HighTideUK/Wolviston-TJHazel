<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;
use App\Contact;

class ContactController extends Controller
{

    public function submit(Request $request)
    {
        
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'company' => $request->input('company'),
            'message' => $request->input('message'),
        ];

        $details = Contact::create($data);

        Mail::to(env('ADMIN_EMAIL'))->send(new ContactFormSubmission($details));

        return response()->json([
            'type' => 'success',
            'title' => 'Message sent',
            'message' => 'Your message has been successfully received'
        ]);

    }

}
