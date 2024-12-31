<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewGradeNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $grade;
    public $date;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($grade, $date)
    {
        $this->grade = $grade;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new_grade_notification')
            ->subject('New Grade Notification');
    }
}
