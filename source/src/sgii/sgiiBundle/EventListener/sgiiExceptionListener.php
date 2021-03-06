<?php

namespace sgii\sgiiBundle\EventListener;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Listener de excepciones
 * @package sgii\sgiiBundle\EventListener;
 */
class sgiiExceptionListener extends Controller
{
    protected $templating;
    protected $container;
    
    public function __construct(EngineInterface $templating, $container)
    {
        $this->templating = $templating;
        $this->container = $container;
    }
    
    /**
     * Listener que se ejecuta cuando hay una exception en la aplicacion
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent $event
     * @return Response Vista renderizada por error personalizado
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        if ($this->container->getParameter('kernel.environment') === 'dev') {
           return;
        }

        $response = new Response();
        $exception = $event->getException();
        $code = $exception->getStatusCode();
        $errormsj = $exception->getMessage();
        $auxStatusText = isset(Response::$statusTexts[$code]) ? Response::$statusTexts[$code] : '';
		$this->container->get('security')->setError("ERROR:".$code." - TEXTO:".$auxStatusText." - MENSAJE:".$errormsj);//Guardar el error
        $ViewRender = $this->templating->render('::error.html.twig', array('status_code'    => $code ));
        $response->setContent($ViewRender);
        $event->setResponse($response);
    }
}