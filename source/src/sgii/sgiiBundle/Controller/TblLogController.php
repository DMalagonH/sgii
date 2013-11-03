<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Controlador de errores de la aplicacion
 * @package sgiiBundle/Controller
 * @Route("/errores")
 */
class TblLogController extends Controller
{
    /**
     * Listado de errores registrador
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de errores
     * @Template("sgiiBundle:TblLog:index.html.twig")
     * @Route("/", name="errores")
     */
    public function loginAction()
    {
        $entities = $this->get('queries')->getErrores();
        return array( 'entities' => $entities );
    }
}
?>
