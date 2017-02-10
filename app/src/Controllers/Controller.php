<?php

/**
 * @package Controller
 * @subpackage App
 */
namespace App\Controller;

use Slim\Container;

class Controller
{
    /**
     * @var \Slim\Views\Twig
     */
    protected $view;

    /**
     * @var \Monolog\Logger
     */
    protected $logger;

    /**
     * @var \Slim\Flash\Messages
     */
    protected $flash;

    public function __construct(Container $container)
    {
        $this->view = $container->get('view');
        $this->logger = $container->get('logger');
        $this->flash = $container->get('flash');
    }
}
