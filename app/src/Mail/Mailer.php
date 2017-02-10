<?php

namespace App\Mail;

class Mailer
{
    /**
     * @var \Slim\Views\Twig
     */
    protected $view;
    
    /**
     * @var \PHPMailer
     */
    protected $mailer;
    
    /**
     * @param \Slim\Views\Twig $view
     * @param \PHPMailer       $mailer
     */
    public function __construct($view, $mailer)
    {
        $this->view = $view;
        $this->mailer = $mailer;
    }
    
    public function send($template, $data, $callback)
    {
        $message = new Message($this->mailer);
        
        $message->body($this->view->fetch($template, $data));
        
        call_user_func($callback, $message);
        
        if (! $this->mailer->send()) {
            throw new \Exception($this->mailer->ErrorInfo, 1);
        }
    }
}
