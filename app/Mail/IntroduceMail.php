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

class IntroduceMail extends Mailable
{
    use Queueable, SerializesModels;

    private Job $job;
    private User $user;


    public function __construct(Job $job, User $user)
    {
        $this->job = $job;
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
            ->subject('[' . $this->job->company()->first()->name . '] Cơ hội việc làm cho bạn - ' . $this->job->title)
            ->view('email.to_introduce')
            ->with(
                [
                    "full_name" => $this->user->name,
                    "job_title" => $this->job->title,
                    "company_name" => $this->job->company()->first()->name,
                    "job_id" => $this->job->id,
                ]
            );
    }

}
