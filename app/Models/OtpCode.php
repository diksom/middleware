<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class OtpCode extends Model
{
    use Notifiable, UsesUuid;
    protected $fillable = [
        'user_id', 'valid_until', 'otp'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
