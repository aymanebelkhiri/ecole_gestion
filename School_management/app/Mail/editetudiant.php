<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class editetudiant extends Mailable
{
    use Queueable, SerializesModels;

    public $password; // Ajout de la visibilité publique

    /**
     * Create a new message instance.
     * @param string $password
     */
    public function __construct() // Correction de la syntaxe
    {
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from("belkhiriaymane5@gmail.com")
            ->subject('New Notification !!')
            ->view('emails.editetudiant'); 
    }
}
