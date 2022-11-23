<?php

namespace App\Mail;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankyouMailForRejectOffer extends Mailable
{
    use Queueable, SerializesModels;

    private User $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Thư cảm ơn - ' . $this->user->name)
            ->view('email.thank_you_for_reject_offer')
            ->with(
                [
                    "full_name" => $this->user->name,
                ]
            );
    }

}
