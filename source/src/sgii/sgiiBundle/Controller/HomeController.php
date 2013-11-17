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
        $acciones_usuario = $this->countAuditoriaUsuario($usuarioId);
//        $security->debug($instrumentos);
       
        $security->setAuditoria('Ingreso a la página principal');
        return array(
            'instrumentos' => $instrumentos,
            'notificaciones' => $notificaciones,
            'acciones_usuario' => $acciones_usuario
        );
    }
    
    
    private function countAuditoriaUsuario($usuarioId)
    {
        $count = 0;
        
        $em = $this->getDoctrine()->getManager();
        
        $dql = "SELECT COUNT(a.id) c FROM sgiiBundle:TblAuditoria a"
                . " WHERE a.audUsuarioId = :usuarioId";
        $query = $em->createQuery($dql);
        $query->setParameter('usuarioId', $usuarioId);
        $result = $query->getResult();
        
        if(isset($result[0]['c']))
        {
            $count = $result[0]['c'];
        }
        
        return $count;
    }
}

?>
