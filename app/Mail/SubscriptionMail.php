<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubscriptionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $parameters;
    public $user_details;
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
        $this->user_details = \App\Http\Controllers\HelperController::getUserDetails($parameters['user_id']);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('core-modules.subscription.email.subscription');
    }
}
