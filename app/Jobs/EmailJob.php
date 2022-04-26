<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class EmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $name;
    protected $dataConfigEmail;

    public function __construct($email, $name, $dataConfigEmail)
    {
        $this->email = $email;
        $this->name = $name;
        $this->dataConfigEmail = $dataConfigEmail;
    }

    public function handle()
    {
        $email = $this->email;
        $name  = $this->name;
        $dataConfigEmail = $this->dataConfigEmail;

        //* Config email
        $from = $dataConfigEmail['from'];
        $subject = $dataConfigEmail['subject'];
        $body = $dataConfigEmail['body'];

        $data = array(
            'email' => $email,
            'name' => $name,
            'body' => $body,
            'subject' => $subject
        );

        //TODO: Send to email user
        Mail::send('layouts.mail', $data, function ($message) use ($email, $subject, $from) {
            $message->to($email)->subject($subject);
            $message->from(config('app.mail_from'), $from);
        });
    }
}
