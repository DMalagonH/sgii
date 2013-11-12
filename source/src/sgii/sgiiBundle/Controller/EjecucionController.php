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
class EjecucionController extends Controller
{
    /**
     * Index para la ejecucion de instrumento
     * 
     * @Route("/{id}", name="ejecucion_instrumento")
     * @Template("sgiiBundle:Ejecucion:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Response
     */
    public function indexAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $usuarioId = $security->getSessionValue('id');
        
        $participo = $this->usuarioParticipoInstrumento($id, $usuarioId);
        
        if(!$participo['invitado'])
        {
            throw $this->createNotFoundException("Acceso denegado");
        }
        
        if(!$participo['participo'])
        {
            // codigo ...
        }
        
        return array(
            'participo' => $participo['participo']
        );
    }
    
    private function usuarioParticipoInstrumento($instrumentoId, $usuarioId)
    {
        $participo = false;
        $invitado = false;
        
        $em = $this->getDoctrine()->getManager();
        
        $dql = "SELECT uh.ushAplico 
                FROM sgiiBundle:TblUsuarioHerramienta uh
                WHERE uh.usuario = :usuarioId
                    AND uh.herramienta = :instrumentoId
                  ";
        $query = $em->createQuery($dql);
        $query->setParameter('usuarioId', $usuarioId);
        $query->setParameter('instrumentoId', $instrumentoId);
        $query->setMaxResults(1);
        $result = $query->getResult();
        
        if(count($result)>0)
        {
            $invitado = true;
            $participo = $result[0]['ushAplico'];
        }
        
        return array(
            'invitado' => $invitado,
            'participo' => $participo
        );
    }
    
    private function estaActivoInstrumento($id)
    {
        
    }
}

