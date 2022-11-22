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

class InterviewMail extends Mailable
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
            ->subject('Interview invitation - ' . $this->job->title)
            ->view('email.to_interview')
            ->with(
                [
                    "full_name" => $this->user->name,
                    "job_title" => $this->job->title,
                    "company_name"=> $this->job->company()->first()->name
                ]
            );
    }

}
