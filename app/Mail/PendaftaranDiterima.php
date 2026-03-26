<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PendaftaranDiterima extends Mailable
{
    use Queueable, SerializesModels;

    public $pendaftar;
    public $password;

    public function __construct($pendaftar, $password)
    {
        $this->pendaftar = $pendaftar;
        $this->password  = $password;
    }

    public function build()
    {
        return $this->subject('Pendaftaran Taekwondo Diterima!')
                    ->view('emails.pendaftaran_diterima');
    }
}