<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\User;

use App\Mail\DeliverNewMessage;
use Mail;

class MailboxController extends Controller
{
    public function inbox(Message $message)
    {
        return view('admin.mailbox.index')->with([
            'messages' => $message->get(),
        ]);
    }

    public function showMessage(Message $message)
    {
        $message->update([
            'unread' => false,
        ]);

        return view('admin.mailbox.mail')->with([
            'msg' => $message,
        ]);
    }
}
