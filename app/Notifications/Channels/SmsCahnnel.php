<?php

namespace App\Notifications\Channels;

use Ghasedak\GhasedaksmsApi;

class SmsCahnnel
{
    public function sendOtpSms()
    {
        $api = $this->GhasedaksmsApi(env('GHASEDAK_SMS_API_KEY'));
    }

}
