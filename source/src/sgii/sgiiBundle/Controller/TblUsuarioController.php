<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblUsuario;
use sgii\sgiiBundle\Entity\TblUsuarioPerfil;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Controlador de Usuarios
 * @package sgiiBundle/Controller
 * @Route("/usuarios")
 */
class TblUsuarioController extends Controller
{
    /**
     * Listado de usuarios
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de usuarios
     * @Template("sgiiBundle:TblUsuario:index.html.twig")
     * @Route("/", name="usuarios")
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entities = $this->get('queries')->getUsuarios();
        return array('entities' => $entities );
    }
    
    /**
     * Ver detalles del usuario
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del usuario
     * @return Render Vista renderizada con detalles del usuario
     * @Template("sgiiBundle:TblUsuario:show.html.twig")
     * @Route("/{id}/show", name="usuarios_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entity = $this->get('queries')->getUsuarios($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Agregar usuario
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nuevo usuario
     * @return Render Formulario de nuevo usuario
     * @Template("sgiiBundle:TblUsuario:new.html.twig")
     * @Route("/new", name="usuarios_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $entity = new TblUsuario();
        $form = $this->usuarioForm();
        
        if ($request->getMethod() == "POST") {
            $form->bind($request);
            if ($form->isvalid())
            {
                $dataForm = $form->getData();
                if ($this->get('queries')->existUser($dataForm['usuLog'], $dataForm['usuCedula'])) {
                    $errores = $this->validateFormUsuario($dataForm);
                    if ($errores == 0)
                    {
                        $newPass = $security->encriptar($dataForm['usuCedula']);
                        $nUser = new TblUsuario();
                        $nUser->setUsuCedula($dataForm['usuCedula']);
                        $nUser->setUsuNombre($dataForm['usuNombre']);
                        $nUser->setUsuFechaCreacion(new \DateTime());
                        $nUser->setUsuLog($dataForm['usuLog']);
                        $nUser->setUsuPassword($newPass);
                        $nUser->setUsuEstado($dataForm['usuEstado']);
                        $nUser->setCargoId($dataForm['cargoId']);
                        $nUser->setDepartamentoId($dataForm['departamentoId']);
                        $nUser->setOrganizacionId($dataForm['organizacionId']);
                        
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($nUser);
                        $em->flush();
                        
                        $nUserPerfil = New TblUsuarioPerfil();
                        $nUserPerfil->setPerfilId($dataForm['perfilId']);
                        $nUserPerfil->setUsuarioId($nUser->getId());
                        $em->persist($nUserPerfil);
                        $em->flush();
                        
                        $security->setAuditoria('Nuevo Usuario: '.$nUser->getId());
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nuevo usuario agregado"));
                        return $this->redirect($this->generateUrl('usuarios_show', array('id' => $nUser->getId())));
                    }
                    else {
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
                    }
                } else {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Ya existe un usuario con estos datos"));
                }
            }
        }

        return array('entity' => $entity, 'form'   => $form->createView());
    }

    /**
     * Editar usuario
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form del usuario a editar
     * @return Render Formulario del usuario a editar
     * @Template("sgiiBundle:TblUsuario:edit.html.twig")
     * @Route("/{id}/edit", name="usuarios_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $nUser = $em->getRepository('sgiiBundle:TblUsuario')->find($id);

        if (!$nUser) {
            throw $this->createNotFoundException('Unable to find TblUsuario entity.');
        }
        
        $perfilId = $this->get('queries')->getPerfilUsuario($id);
        $editForm = $this->usuarioForm($nUser, $perfilId);
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isvalid())
            {
                $dataForm = $editForm->getData();
                if ($this->get('queries')->existUser($dataForm['usuLog'], $dataForm['usuCedula'], $id)) {
                    $errores = $this->validateFormUsuario($dataForm);
                    if ($errores == 0)
                    {
                        $nUser->setUsuCedula($dataForm['usuCedula']);
                        $nUser->setUsuNombre($dataForm['usuNombre']);
                        $nUser->setUsuLog($dataForm['usuLog']);
                        $nUser->setUsuEstado($dataForm['usuEstado']);
                        $nUser->setCargoId($dataForm['cargoId']);
                        $nUser->setDepartamentoId($dataForm['departamentoId']);
                        $nUser->setOrganizacionId($dataForm['organizacionId']);
                        
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($nUser);
                        
                        $this->get('queries')->deletPerfilesUsuario($id);
                        $nUserPerfil = New TblUsuarioPerfil();
                        $nUserPerfil->setPerfilId($dataForm['perfilId']);
                        $nUserPerfil->setUsuarioId($id);
                        $em->persist($nUserPerfil);
                        $em->flush();
                        
                        $security->setAuditoria('Editar Usuario: '.$nUser->getId());
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Usuario editado correctamente"));
                        return $this->redirect($this->generateUrl('usuarios_show', array('id' => $nUser->getId())));
                    }
                    else {
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
                    }
                } else {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Ya existe un usuario con estos datos"));
                }
            }
            else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        return array( 'entity' => $nUser, 'form' => $editForm->createView());
    }

    /**
     * Borrar un usuario
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar del usuario
     * @param Int $id Id del usuario a eliminar
     * @return Redirect Redirigir a listado de usuarios
     * @Route("/{id}", name="usuarios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sgiiBundle:TblUsuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblUsuario entity.');
            }

            $this->get('queries')->deletPerfilesUsuario($id);
            $em->remove($entity);
            $em->flush();
            
            $security->setAuditoria('Eliminar usuario: '.$id. " - ".$entity->getUsuLog());
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El usuario ha sido eliminado correctamente"));
        }
        return $this->redirect($this->generateUrl('usuarios'));
    }

    //--------------------------------------------/
    //--  M E T O D O S  y   F U N C I O N E S  --/
    //--------------------------------------------/
    
    /**
     * Creación de formulario para eliminar un usuario
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del usuario
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuarios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirm')))
            ->getForm();
    }
    
    /**
     * Funcion para crear el formulario de crear nuevo usuario
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $usuario Objeto TblUsuario
     * @param Int $perfilId Id del perfil del usuario
     * @return Object Formulario
     */
    private function usuarioForm($usuario = null, $perfilId = null)
    {
        $orgAct = ($usuario) ? (($usuario->getOrganizacionId()) ? $usuario->getOrganizacionId()  : '') : '';
        $empty_value_org = ($usuario) ? (($usuario->getOrganizacionId()) ? false : 'Seleccione una organización') : 'Seleccione una organización';
        $ARRorg = $this->get('queries')->getOrganizacionesArray();
        
        $carAct = ($usuario) ? (($usuario->getCargoId()) ? $usuario->getCargoId() : '') : '';
        $empty_value_car = ($usuario) ? (($usuario->getCargoId()) ? false : 'Seleccione un cargo') : 'Seleccione un cargo';
        $ARRcar = $this->get('queries')->getCargosArray();
        
        $depAct = ($usuario) ? (($usuario->getDepartamentoId()) ? $usuario->getDepartamentoId() : '') : '';
        $empty_value_dep = ($usuario) ? (($usuario->getDepartamentoId()) ? false : 'Seleccione un departamento') : 'Seleccione un departamento';
        $ARRdep = $this->get('queries')->getDepartamentosArray();
        
        $perAct = ($perfilId) ? $perfilId : 4;
        $empty_value_per = false;
        $ARRper = $this->get('queries')->getPerfilesArray();

        $formData = array(
            'usuNombre' => ($usuario) ? $usuario->getUsuNombre() : null,
            'usuCedula' => ($usuario) ? $usuario->getUsuCedula() : null,
            'usuLog' => ($usuario) ? $usuario->getUsuLog() : null,
            'usuEstado' => ($usuario) ? $usuario->getUsuEstado() : null,
            'organizacionId' => null,
            'departamentoId' => null,
            'cargoId' => null,
            'rolId' => null,
            'perfilId' => null,
        );
        
        $form = $this->createFormBuilder($formData)
           ->add('usuNombre', 'text', array('required' => true, 'attr' => Array('pattern' => '^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$' )))
           ->add('usuCedula', 'text', array('required' => true, 'attr' => Array('pattern' => '^[0-9]*$' )))
           ->add('usuLog', 'email', array('required' => true))
           ->add('usuEstado', 'checkbox', array('required' => false))
           ->add('organizacionId', 'choice', array('choices'  => $ARRorg,  'preferred_choices' => array($orgAct), 'required' => false, 'empty_value' => $empty_value_org))
           ->add('departamentoId', 'choice', array('choices'  => $ARRdep,  'preferred_choices' => array($depAct), 'required' => false, 'empty_value' => $empty_value_dep))
           ->add('cargoId', 'choice', array('choices'  => $ARRcar,  'preferred_choices' => array($carAct), 'required' => false, 'empty_value' => $empty_value_car))
           ->add('perfilId', 'choice', array('choices'  => $ARRper,  'preferred_choices' => array($perAct), 'required' => true, 'empty_value' => $empty_value_per))
           ->getForm();
        return $form;
    }
    
    /**
	 * Funcion Privada de validación de formulario del usuario
     * Validacione aplicadas
     * $usuNombre => NotBlank - Regex (Validacion para solo nombres y apellidos (letras y espacios))
     * $usuCedula => NotBlank - Regex (Validacion para solo NUMEROS)
     * $usuLog => NotBlank - Email
	 * 
	 * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Object Formulario a validar
     * @return Int Cantidad de errores encontrados
	 */
	private function validateFormUsuario($dataForm)
	{
		$usuNombre = $dataForm['usuNombre'];
        $usuCedula = $dataForm['usuCedula'];
        $usuLog = $dataForm['usuLog'];
        $perfilId = $dataForm['perfilId'];
        
        $NotBlank = new Assert\NotBlank();
		$RegexTEXT = new Assert\Regex(Array('pattern'=>'/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$/'));
        $RegexNUM = new Assert\Regex(Array('pattern'=>'/^[0-9]*$/'));
        $Email = new Assert\Email();
        
		$countErrores = 0;
        $countErrores += (count($this->get('validator')->validateValue($usuNombre, Array($NotBlank, $RegexTEXT))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($usuCedula, Array($NotBlank, $RegexNUM))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($usuLog, Array($NotBlank, $Email))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($perfilId, Array($NotBlank))) == 0) ? 0 : 1;
		return $countErrores;
	}
}