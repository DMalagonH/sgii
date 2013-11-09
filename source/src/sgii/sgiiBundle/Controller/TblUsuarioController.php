<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblUsuario;
use sgii\sgiiBundle\Form\TblUsuarioType;
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
     * Funcion para crear el formulario de crear nuevo usuario
     * 
     * @author Camilo Quijano <camilo@altactic.com>
     * @version 1
     * @return Object Formulario
     */
    private function createUsuarioForm()
    {
        $orgAct = '';
        $empty_value_org = 'Seleccione una organización';
        $ARRorg = $this->get('queries')->getOrganizacionesArray();
        
        $carAct = '';
        $empty_value_car = 'Seleccione un cargo';
        $ARRcar = $this->get('queries')->getCargosArray();
        
        $depAct = '';
        $empty_value_dep = 'Seleccione un departamento';
        $ARRdep = $this->get('queries')->getDepartamentosArray();

        $formData = array(
            'usuNombre' => null,
            'usuCedula' => null,
            'usuLog' => null,
            'usuEstado' => null,
            'organizacionId' => null,
            'departamentoId' => null,
            'cargoId' => null,
            'usuPassword' => null,
            'usuPassword_conf' => null,
            '' => null,
        );
        
        $form = $this->createFormBuilder($formData)
           ->add('usuNombre', 'text', array('required' => true, 'attr' => Array('pattern' => '^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$' )))
           ->add('usuCedula', 'text', array('required' => true, 'attr' => Array('pattern' => '^[0-9]*$' )))
           ->add('usuLog', 'email', array('required' => true))
           ->add('usuEstado', 'checkbox', array('required' => false))
           ->add('organizacionId', 'choice', array('choices'  => $ARRorg,  'preferred_choices' => array($orgAct), 'required' => false, 'empty_value' => $empty_value_org))
           ->add('departamentoId', 'choice', array('choices'  => $ARRdep,  'preferred_choices' => array($depAct), 'required' => false, 'empty_value' => $empty_value_dep))
           ->add('cargosId', 'choice', array('choices'  => $ARRcar,  'preferred_choices' => array($carAct), 'required' => false, 'empty_value' => $empty_value_car))
           ->add('usuPassword', 'password', array('required' => true))
           ->add('usuPassword_conf', 'password', array('required' => true))
           ->getForm();
        return $form;
    }
    
    
    /**
	 * Funcion Privada de validación de formulario del usuario tipo estudiante
	 * (nombre, apellido, imagen, fecha de nacimiento, colegio, etc.)
	 * 
	 * @author Camilo Quijano <camilo@altactic.com>
     * @version 1
     * @param Object Formulario a validar
     * @return Int Cantidad de errores encontrados
	 */
	private function validateFormUsuario($dataForm)
	{
		$usuNombre = $dataForm['usuNombre'];
        $usuCedula = $dataForm['usuCedula'];
        $usuLog = $dataForm['usuLog'];
        
        $NotBlank = new Assert\NotBlank();
		$RegexTEXT = new Assert\Regex(Array('pattern'=>'/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$/'));
        $RegexNUM = new Assert\Regex(Array('pattern'=>'/^[0-9]*$/'));
        $Email = new Assert\Email();
		/**
		 * Validacione aplicadas
		 * $usuNombre => NotBlank - Regex (Validacion para solo nombres y apellidos (letras y espacios))
         * $usuCedula => NotBlank - Regex (Validacion para solo NUMEROS)
         * $usuLog => NotBlank - Email
		 */

		$countErrores = 0;
        $countErrores += (count($this->get('validator')->validateValue($usuNombre, Array($NotBlank, $RegexTEXT))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($usuCedula, Array($NotBlank, $RegexNUM))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($usuLog, Array($NotBlank, $Email))) == 0) ? 0 : 1;
		return $countErrores;
	}
    
    
    /**
     * Displays a form to create a new TblUsuario entity.
     *
     * @Route("/new", name="usuarios_new")
     * @Method({"GET", "POST"})
     * @Template()
     */
    public function newAction(Request $request)
    {
        $entity = new TblUsuario();
        $form = $this->createUsuarioForm();
        
        if ($request->getMethod() == "POST") {
            $form->bind($request);
            if ($form->isvalid())
            {
                $dataForm = $form->getData();
                $errores = $this->validateFormUsuario($dataForm);
                if ($errores == 0)
                {
                    // pendiente validacion de contraseña
                    // Guardar la informacion del nuevo registro
                    // Validacion de que no exista el usuario
                    // 
                    //$security->setAuditoria('Nuevo cargo: '.$entity->getId());
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nuevo cargo agregado"));
                    //return $this->redirect($this->generateUrl('cargo_show', array('id' => $entity->getId())));
                }
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    
    /**
     * Creates a new TblUsuario entity.
     *
     * @Route("/", name="usuarios_create")
     * @Method("POST")
     * @Template("sgiiBundle:TblUsuario:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new TblUsuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuarios_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a TblUsuario entity.
    *
    * @param TblUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TblUsuario $entity)
    {
        $form = $this->createForm(new TblUsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuarios_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    

    

    /**
     * Displays a form to edit an existing TblUsuario entity.
     *
     * @Route("/{id}/edit", name="usuarios_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sgiiBundle:TblUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblUsuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a TblUsuario entity.
    *
    * @param TblUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TblUsuario $entity)
    {
        $form = $this->createForm(new TblUsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuarios_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TblUsuario entity.
     *
     * @Route("/{id}", name="usuarios_update")
     * @Method("PUT")
     * @Template("sgiiBundle:TblUsuario:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('sgiiBundle:TblUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuarios_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a TblUsuario entity.
     *
     * @Route("/{id}", name="usuarios_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sgiiBundle:TblUsuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblUsuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuarios'));
    }

    /**
     * Creates a form to delete a TblUsuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuarios_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
