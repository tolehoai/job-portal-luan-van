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
    protected string $access_token;


    public function __construct(Job $job, User $user, string $salary, string $startDate, string $access_token)
    {
        $this->job = $job;
        $this->user = $user;
        $this->salary = $salary;
        $this->startDate = $startDate;
        $this->access_token = $access_token;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $companyName = $this->job->company()->first()->name;
        //genrate accept offer link
        $acceptOfferLink = route('user.offer.accept', ['jobId' => $this->job->id, 'userId' => $this->user->id, 'access_token' => $this->access_token]);
        //genrate reject offer link
        $rejectOfferLink = route('user.offer.reject', ['jobId' => $this->job->id, 'userId' => $this->user->id, 'access_token' => $this->access_token]);
        return $this
            ->subject('CONGRATULATIONS from ' . $companyName . ' - ' . $this->user->name)
            ->view('email.to_offer')
            ->with(
                [
                    'jobTitle' => $this->job->title,
                    'user_name' => $this->user->name,
                    'salary' => $this->salary,
                    'startDate' => $this->startDate,
                    'companyName' => $companyName,
                    'acceptOfferLink' => $acceptOfferLink,
                    'rejectOfferLink' => $rejectOfferLink,
                ]
            );
    }

}
