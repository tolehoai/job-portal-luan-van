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

class OfferMail extends Mailable
{
    use Queueable, SerializesModels;

    private Job $job;
    private User $user;
    private string $salary;
    private string $startDate;


    public function __construct(Job $job, User $user, string $salary, string $startDate)
    {
        $this->job = $job;
        $this->user = $user;
        $this->salary = $salary;
        $this->startDate = $startDate;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $companyName = $this->job->company()->first()->name;
        return $this
            ->subject('CONGRATULATIONS from ' . $companyName . ' - ' . $this->user->name)
            ->view('email.to_offer')
            ->with(
                [
                    'jobTitle' => $this->job->title,
                    'user_name' => $this->user->name,
                    'salary' => $this->salary,
                    'startDate' => $this->startDate,
                    'companyName' => $companyName
                ]
            );
    }

}
