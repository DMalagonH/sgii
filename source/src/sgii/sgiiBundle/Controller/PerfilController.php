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
        
        $usuario = $this->getUsuario($id);
                
        if(!$usuario)
        {
            throw $this->createNotFoundException();
        }
        
        return array(
            'usuario'   =>  $usuario,
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
    public function editAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $usuarioId = $security->getSessionValue('id');
        
        $queries = $this->get('queries');
        $cargos = $queries->getCargos();
        $organizaciones = $queries->getOrganizaciones();
        $departamentos = $queries->getDepartamentos();
        
        $usuario = $this->getUsuario($usuarioId);
        
        $nivAct = ($usuario) ? (($usuario['nivelId']) ? $usuario['nivelId'] : '') : '';
        $empty_value_niv = ($usuario) ? (($usuario['nivelId']) ? false : 'Seleccione un nivel') : 'Seleccione un nivel';
        $ARRniv = $queries->getNivelesArray();
        
        $formData = array(
            'usuApellido' => $usuario['usuApellido'], 
            'nombre' => $usuario['usuNombre'], 
            'correo' => $usuario['usuLog'],
            'organizacion' => $usuario['organizacionId'],
            'cargo' => $usuario['cargoId'],
            'nivelId' => $usuario['nivelId'],
            'departamento' => $usuario['departamentoId']
        );
        $form = $this->createFormBuilder($formData)
           ->add('nombre', 'text', array('required' => true))
           ->add('usuApellido', 'text', array('required' => true))
           ->add('correo', 'email', array('required' => true))
           ->add('organizacion', 'text', array('required' => false))
           ->add('cargo', 'text', array('required' => false))
           ->add('nivelId', 'choice', array('choices'  => $ARRniv,  'preferred_choices' => array($nivAct), 'required' => false, 'empty_value' => $empty_value_niv))
           ->add('departamento', 'text', array('required' => false))
           ->getForm(); 
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $queries = $this->get('queries');
                if(!$queries->existsEmail($data['correo'], $usuarioId))
                {
                    $em = $this->getDoctrine()->getEntityManager();
                    $usuario = $em->getRepository('sgiiBundle:TblUsuario')->findOneById($usuarioId);

                    $usuario->setUsuNombre($data['nombre']);
                    $usuario->setUsuApellido($data['usuApellido']);
                    $usuario->setUsuLog($data['correo']);
                    if ($data['cargo']) { $usuario->setCargoId($data['cargo']); }
                    if ($data['nivelId']) { $usuario->setNivelId($data['nivelId']); }
                    if ($data['departamento']) { $usuario->setDepartamentoId($data['departamento']); }
                    if ($data['organizacion']) { $usuario->setOrganizacionId($data['organizacion']); }
                    $em->persist($usuario);
                    $em->flush();
                    
                    $security->setAuditoria('Edición de perfil');
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Información actualizada"));
                    return $this->redirect($this->generateUrl('perfil', array('id'=>$usuarioId)));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Ya existe un usuario con este correo"));
                }
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        
        return array(
            'usuario' => $usuario,
            'form'=> $form->createView(),
            'cargos' => $cargos,
            'departamentos' => $departamentos,
            'organizaciones' => $organizaciones
        );
    }
        
    /**
     * Funcion que obtiene los datos de perfil de un usuario
     * 
     * @param integer $usuarioId id de usuario
     * @return array arreglo de usuario
     */
    private function getUsuario($usuarioId)
    {
        $return = false;
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT 
                    u.id,
                    u.usuCedula,
                    u.usuApellido,
                    u.usuNombre,
                    u.usuFechaCreacion,
                    u.usuLog,
                    c.id cargoId,
                    c.carNombre,
                    d.id departamentoId,
                    d.depNombre,
                    o.id organizacionId,
                    o.orgNombre,
                    n.id AS nivelId,
                    n.nivNombre
                FROM
                    sgiiBundle:TblUsuario u
                    LEFT JOIN sgiiBundle:TblCargo c WITH u.cargoId = c.id
                    LEFT JOIN sgiiBundle:TblDepartamento d  WITH u.departamentoId = d.id
                    LEFT JOIN sgiiBundle:TblOrganizacion o WITH u.organizacionId = o.id
                    LEFT JOIN sgiiBundle:TblNivel n WITH n.id = u.nivelId
                WHERE u.id = :usuarioId";
        $query = $em->createQuery($dql);
        $query->setParameter('usuarioId', $usuarioId);
        $query->setMaxResults(1);
        $usuario = $query->getResult();
        
        if(count($usuario)==1)
        {
            $return = $usuario[0];
        }
        return $return;
    }
    
    /**
     * Accion para cambiar la contraseña del usuario
     * 
     * @Route("/cambiarpass", name="cambiar_password")
     * @Template("sgiiBundle:Perfil:cambiarpass.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Resonse
     */
    public function cambiarPasswordAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $usuarioId = $security->getSessionValue('id');
        
        $formData = array(
            'current_pass' => null, 
            'new_pass' => null,
            'confirm_pass' => null
        );
        $form = $this->createFormBuilder($formData)
           ->add('current_pass', 'password', array('required' => true))
           ->add('new_pass', 'password', array('required' => true))
           ->add('confirm_pass', 'password', array('required' => true))
           ->getForm(); 
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $em = $this->getDoctrine()->getEntityManager();
                $dql = "SELECT COUNT(u.id) c FROM sgiiBundle:TblUsuario u
                        WHERE u.id = :usuarioId AND u.usuPassword = :pass";
                $query = $em->createQuery($dql);
                $query->setParameter('usuarioId', $usuarioId);
                $query->setParameter('pass', $security->encriptar($data['current_pass']));
                $query->setMaxResults(1);
                $count = $query->getResult();
                
                if($count[0]['c'] == 1)
                {
                    if($data['new_pass'] == $data['confirm_pass'])
                    {
                        if($security->validarPassword($data['new_pass']))
                        {
                            $dql = "UPDATE sgiiBundle:TblUsuario u SET u.usuPassword = :pass WHERE u.id = :usuarioId";
                            $query = $em->createQuery($dql);
                            $query->setParameter('usuarioId', $usuarioId);
                            $query->setParameter('pass', $security->encriptar($data['new_pass']));
                            $query->getResult();
                            
                            $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "La contraseña se ha cambiado correctamente"));
                            $security->setAuditoria("Cambio de contraseña");
                        }
                        else
                        {
                            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "La contraseña no es suficientemente segura"));
                        }
                    }
                    else
                    {
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Las contraseñas no coinciden"));
                    }
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "La contraseña actual no coincide"));
                }
                
            }
        }
        
        
        return array(
            'form'=> $form->createView(),
        );
    }
}
?>
