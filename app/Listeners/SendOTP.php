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
    public function handle(SendOTPEvent $event)
    {
        Mail::to($event->otpcode)->send(new SendOTPMail($event->otpcode));
    }
}
