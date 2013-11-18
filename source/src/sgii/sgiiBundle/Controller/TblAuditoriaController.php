<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Controlador de auditoria de la aplicacion
 * @package sgiiBundle/Controller
 * @Route("/auditoria")
 */
class TblAuditoriaController extends Controller
{
    /**
     * Listado de acciones auditables registrador
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de acciones auditables
     * @Template("sgiiBundle:TblAuditoria:index.html.twig")
     * @Route("/", name="auditoria")
     */
    public function loginAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entities = $this->get('queries')->getAuditoria();
        return array( 'entities' => $entities );
    }
}
?>
