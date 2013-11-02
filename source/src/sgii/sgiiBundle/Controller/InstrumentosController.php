<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para el login de la aplicacion.
 * 
 * @Route("/instrumentos")
 * @package CuentaBundle/Controller
 */
class InstrumentosController extends Controller
{
    /**
     * Accion para login de la aplicacion
     * 
     * @Route("/", name="instrumentos")
     * @Template("sgiiBundle:Instrumentos:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function indexAction()
    {
        return array(
            
        );
    }
}
?>