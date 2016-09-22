<?php

namespace App\Controller;

use Slim\Container;

class Controller
{
    protected $view;
    protected $logger;
    protected $flash;

    public function __construct(Container $c)
    {
        $this->view = $c->get('view');
        $this->logger = $c->get('logger');
        $this->flash = $c->get('flash');
    }
}