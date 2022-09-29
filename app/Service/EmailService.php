<?php

namespace App\Service;

use App\Jobs\SendRegisterMail;
use App\Mail\RegisterMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    /**
     * Handle Queue Process
     */
    public function sendRegisterMail(User $user): void
    {
        $email = new RegisterMail($user);

        Mail::to($user->email)->queue($email);
    }
}
