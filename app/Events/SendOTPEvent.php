<?php

namespace App\Events;

use App\OtpCode;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendOTPEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $otpcode;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(OtpCode $otpcode)
    {
        $this->otpcode = $otpcode;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    // public function broadcastOn()
    // {
    //     return new PrivateChannel('channel-name');
    // }
}
