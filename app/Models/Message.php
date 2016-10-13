<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
	    'sender', 'sent_from', 'sent_to', 'subject', 'body', 'unread',
	];
}
