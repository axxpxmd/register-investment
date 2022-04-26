<?php

namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

// Models
use App\Models\Daftar;
use App\Models\ConfigMail;

class DaftarController extends Controller
{
    public function index()
    {
        return view('pages.form-daftar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'unique:daftars,email',
            'organization' => 'required',
            'country' => 'required|max:15'
        ]);

        //* params
        $email = $request->email;
        $name  = $request->name;

        //TODO: store to  table daftars
        $input = $request->all();
        Daftar::create($input);

        //* Config email
        $configMail = ConfigMail::select('subject', 'body')->first();
        $from = $configMail->from;
        $subject = $configMail->subject;
        $body = $configMail->body;

        $data = array(
            'email' => $email,
            'name' => $name,
            'body' => $body
        );

        //TODO: Send to email user
        Mail::send('layouts.mail', $data, function ($message) use ($email, $subject, $from) {
            $message->to($email)->subject($subject);
            $message->from(config('app.mail_from'), $from);
        });

        return view('pages.success');
    }
}
