<?php

namespace App\Mail;

class Message
{
    /**
     * @var \PHPMailer
     */
    protected $mailer;
    
    public function __construct($mailer)
    {
        $this->mailer = $mailer;
    }
    
    public function to($address)
    {
        $this->mailer->addAddress($address);
    }

    /**
     * @param string $subject
     * @return void
     */
    public function subject($subject)
    {
        $this->mailer->Subject = utf8_decode($subject);
    }

    /**
     * @param string $body
     * @return void
     */
    public function body($body)
    {
        $this->mailer->Body = utf8_decode($body);
    }

    /**
     * @param string $from
     * @return void
     */
    public function from($from)
    {
        $this->mailer->From = $from;
    }
    
    /**
     * @param string $fromName
     * @return void
     */
    public function fromName($fromName)
    {
        $this->mailer->FromName = $fromName;
    }
}
