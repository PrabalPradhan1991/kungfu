<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RequestStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $stage;
    public $user;
    public $status;
    public function __construct($parameters)
    {
        $this->stage = \App\Http\Controllers\CoreModules\Videos\StageModel::where('id', $parameters['stage_id'])->firstOrFail();
        $this->user = \App\Http\Controllers\HelperController::getUserDetails($parameters['user_id']);
        $this->status = $parameters['status'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('core-modules.videos.email.request-access-status');
    }
}