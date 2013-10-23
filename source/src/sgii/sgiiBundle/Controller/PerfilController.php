<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para el perfil de usuario
 * 
 * @Route("/perfil")
 * @package CuentaBundle/Controller
 */
class PerfilController extends Controller
{
    
    /**
     * Accion para la visualizacion de perfil de un usuario
     * 
     * @Route("/{id}/show", name="perfil")
     * @Template("sgiiBundle:Perfil:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param integer $id id de usuario
     * @return Resonse
     */
    public function indexAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT 
                    u.id,
                    u.usuCedula,
                    u.usuNombre,
                    u.usuFechaCreacion,
                    u.usuLog,
                    c.carNombre,
                    d.depNombre,
                    o.orgNombre
                FROM
                    sgiiBundle:TblUsuario u
                    LEFT JOIN sgiiBundle:TblCargo c WITH u.cargoId = c.id
                    LEFT JOIN sgiiBundle:TblDepartamento d  WITH u.departamentoId = d.id
                    LEFT JOIN sgiiBundle:TblOrganizacion o WITH u.organizacionId = o.id
                WHERE u.id = :usuarioId";
        $query = $em->createQuery($dql);
        $query->setParameter('usuarioId', $id);
        $query->setMaxResults(1);
        $usuario = $query->getResult();
                
        if(count($usuario) == 0)
        {
            throw $this->createNotFoundException();
        }
        
        return array(
            'usuario'   =>  $usuario[0],
            'id'        =>  $id
        );
    }
    
    /**
     * Accion para la editar el perfil de un usuario
     * 
     * @Route("/edit", name="edit_perfil")
     * @Template("sgiiBundle:Perfil:edit.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function editAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $usuarioId = $security->getSessionValue('id');
        
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT 
                    u.id,
                    u.usuCedula,
                    u.usuNombre,
                    u.usuFechaCreacion,
                    u.usuLog,
                    c.carNombre,
                    d.depNombre,
                    o.orgNombre
                FROM
                    sgiiBundle:TblUsuario u
                    LEFT JOIN sgiiBundle:TblCargo c WITH u.cargoId = c.id
                    LEFT JOIN sgiiBundle:TblDepartamento d  WITH u.departamentoId = d.id
                    LEFT JOIN sgiiBundle:TblOrganizacion o WITH u.organizacionId = o.id
                WHERE u.id = :usuarioId";
        $query = $em->createQuery($dql);
        $query->setParameter('usuarioId', $usuarioId);
        $query->setMaxResults(1);
        $usuario = $query->getResult();
        
        return array(
            'usuario' => $usuario[0],
        );
    }
}
?>
