<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->queue = "email";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('hoaib1807632@student.ctu.edu.vn')
            ->subject('Register Email From To Le Hoai')
            ->view('email.registerMail', ["user" => $this->user, "title" => "Register"]);
    }
}
