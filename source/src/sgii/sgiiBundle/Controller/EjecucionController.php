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
        $instrumento = false;
        
        if(!$participo['invitado']) // si no esta invitado al instrumento
        {
            throw $this->createNotFoundException("Acceso denegado");
        }
        
        if(!$participo['participo']) // si no ha participado
        {
            $instrumento = $this->getInstrumento($id);
            
            if($instrumento)
            {
                
            }
        }
        
        return array(
            'participo' => $participo['participo'],
            'instrumento' => $instrumento
        );
    }
    
    /**
     * Funcion que obtiene si el usuario esta invitado y/o participado en un instrumento
     * 
     * @param integer $instrumentoId id de instrumento
     * @param integer $usuarioId id de usuario
     * @return array
     */
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
    
    /**
     * Funcion que retorna un instrumento si esta activo
     * 
     * @param integer $id id de instrumento
     * @return array|false
     */
    private function getInstrumento($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $dql = "SELECT
                    h.herNombreHerramienta,
                    th.theNombreHerramienta,
                    p.proNombre
                FROM 
                    sgiiBundle:TblHerramienta h
                    JOIN sgiiBundle:TblUsuarioHerramienta uh WITH uh.herramienta = h.id
                    JOIN sgiiBundle:TblTipoHerramienta th WITH h.tipoHerramienta = th.id
                    LEFT JOIN sgiiBundle:TblProyecto p WITH h.proyecto = p.id
                WHERE
                    h.id = :instrumentoId
                    AND h.herEstado = 1
                    AND (uh.ushFechaActivoInicio <= :current_date OR uh.ushFechaActivoInicio IS NULL)
                    AND (uh.ushFechaActivoFin >= :current_date OR uh.ushFechaActivoFin IS NULL)
                ";
        $query = $em->createQuery($dql);
        $query->setParameter('instrumentoId', $id);
        $query->setParameter('current_date', new \DateTime());
        $query->setMaxResults(1);
        $result = $query->getResult();
        
        $return = false;
        
        if(count($result)>0)
        {
            $return = $result[0];
        }
        
        
        return $return;
    }
        
    /**
     * Funcion para obtener las preguntas del instrumento
     * 
     * @param integer $instrumentoId id de instrumento
     * @return array arreglo de preguntas
     */
    private function getPreguntas($instrumentoId)
    {
        
    }
    
}

