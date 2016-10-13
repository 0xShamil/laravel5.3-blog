<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;


use App\Models\User;
use App\Models\Message;

use App\Http\Requests\StoreUserShoutoutRequest;

use App\Mail\SendUserComposedMail;
use Alert;

use Mail;

class MessagesController extends BaseController
{
    public function storeUserShoutout(StoreUserShoutoutRequest $request)
    {
    	$msg = Message::create([
            'sender' => $request->name,
            'sent_from' => $request->sent_from,
            'subject' => $request->subject,
            'body' => $request->body,
        ]);

        Mail::to(env('MAIL_SUPPORT'))->queue(new SendUserComposedMail($msg));

        Alert::message("Thanks for contacting us. We will get back to you soon.");

        return redirect('/');
    }
}
