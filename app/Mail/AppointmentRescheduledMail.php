<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentRescheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $dentist;
    public $clinic;
    public $service;
    public $patient;

    public function __construct($appointment, $dentist, $clinic, $service, $patient)
    {
        $this->appointment = $appointment;
        $this->dentist = $dentist;
        $this->clinic = $clinic;
        $this->service = $service;
        $this->patient = $patient;
    }

    public function build()
    {
        return $this->subject('Appointment Rescheduled')
            ->view('emails.appointment_rescheduled');
    }
}
