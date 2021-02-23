<?php

namespace App\Mail;

use App\OtpCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendOTPMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $otpcode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otpcode)
    {
        $this->otpcode = $otpcode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('diki_somantri@ymail.com')
            ->view('send_otp')
            ->with([
                'otp' => $this->otpcode->otp,
            ]);
    }
}
