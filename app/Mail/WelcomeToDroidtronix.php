<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\User;

use Password;

class WelcomeToDroidtronix extends Mailable
{
    use Queueable, SerializesModels;

    /** @var \App\Models\User */
    public $user;

    /** @var string */
    public $token;


    /**
    * @param \App\Models\User $user
    */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->token = Password::getRepository()->create($user);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->user->email)
            ->subject('Welcome to '.config('app.name'))
            ->view('emails.welcome');
    }
}
