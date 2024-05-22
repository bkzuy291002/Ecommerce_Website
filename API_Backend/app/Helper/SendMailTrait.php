<?php
namespace App\Helper;

use App\Jobs\SendForgotPasswordJob;

trait SendMailTrait
{
    public function callSendForgotPassword(array $data): void
    {
        dispatch(new SendForgotPasswordJob($data));
    }
}
