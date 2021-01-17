<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user, $point;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $point)
    {
        $this->user = $user;
        $this->point = $point;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reminder', [
          'user' => $this->user,
          'point' => $this->point
        ]);
    }
}
