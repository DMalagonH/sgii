<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para el homepage de la aplicacion.
 * 
 * @Route("/home")
 */
class HomeController extends Controller
{
    
    /**
     * Index para la aplicacion
     * 
     * @Route("/", name="homepage")
     * @Template("sgiiBundle:Home:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Response
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
       
        $usuarioId = $security->getSessionValue('id');
        
        $inst_serv = $this->get('instrumentos');
        
        $instrumentos = $inst_serv->getInstrumentosUsuario($usuarioId);
        $notificaciones = $inst_serv->getHistorialInstrumentosUsuario($usuarioId);
        
//        $security->debug($instrumentos);
       
        
        return array(
            'instrumentos' => $instrumentos,
            'notificaciones' => $notificaciones
        );
    }
    
}

?>
