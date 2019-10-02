<?php

namespace Illuminate\Auth\Passwords;

use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPasswordAdmin as ResetPasswordNotificationAdmin;

trait CanResetPassword
{
    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendPasswordResetNotificationAdmin($token)
    {
        $this->notify(new ResetPasswordNotificationAdmin($token));
    }
}
