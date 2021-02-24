<?php

namespace App\Listeners;

use App\Events\SendOTPEvent;
use App\Mail\SendOTPMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;

class SendOTP implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendOTPEvent  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->condition == 'register') {
            $pesan = "We're excited to have you get started. First you need to confirm your account this isi your OTP Code : ";
        } elseif ($event->condition == 'regenerate') {
            $pesan = "Regenerate OTP successfull. This is your OTP Code : ";
        }
        Mail::to($event->user)->send(new SendOTPMail($event->user, $pesan));
    }
}
