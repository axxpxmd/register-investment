<?php

namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

// Queque
use App\Jobs\EmailJob;

// Models
use App\Models\Daftar;
use App\Models\ConfigMail;

class DaftarController extends Controller
{
    public function index()
    {
        return view('pages.form-daftar');
    }

    public function create(Request $request)
    {
        return view('pages.confirm');
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

        //* config email
        $configEmail = ConfigMail::select('from', 'subject', 'body')->first();
        $dataConfigEmail = [
            'from' => $configEmail->from,
            'subject' => $configEmail->subject,
            'body' => $configEmail->body
        ];

        dispatch(new EmailJob($email, $name, $dataConfigEmail));

        return view('pages.success', compact(
            'name',
            'email'
        ));
    }
}
