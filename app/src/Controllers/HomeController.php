<?php

/**
 * @package Controller
 * @subpackage App
 */
namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class HomeController extends Controller
{
    /**
     * Index action
     *
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index(Request $request, Response $response, $args)
    {
        $this->logger->info("Home page action index");
        $this->flash->addMessage('info', 'Sample flash message');
        $this->view->render($response, 'home.twig');
        
        return $response;
    }
}
