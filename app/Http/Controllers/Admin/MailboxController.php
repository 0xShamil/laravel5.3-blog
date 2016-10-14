<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Message;
use App\Models\User;

use App\Mail\DeliverNewMessage;
use Mail;

use Alert;

class MailboxController extends Controller
{
    public function __construct()
	{
		$this->middleware('can:manage-inbox');
	}

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

    public function destroy(Message $message)
    {
        $message->delete();

        Alert::success('Message deleted successfully', 'Success')->persistent("Close");

        return redirect()->route('admin.mailbox');
    }
}
