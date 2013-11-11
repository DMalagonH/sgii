<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para la ejecucion de un instrumento
 * 
 * @Route("/ejecucion")
 */
class aplicacionInstrumentoController extends Controller
{
    /**
     * Index para la aplicacion de instrumento
     * 
     * @Route("/{id}", name="ejecucion_instrumento")
     * @Template("sgiiBundle:Ejecucion:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Response
     */
    public function indexAction($id)
    {
        return array(
            
        );
    }
}

