<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblUsuario;
use sgii\sgiiBundle\Form\TblUsuarioType;

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
     * Displays a form to create a new TblUsuario entity.
     *
     * @Route("/new", name="usuarios_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new TblUsuario();
        //$form   = $this->createCreateForm($entity);
        $form = $this->createForm(new TblUsuarioType(), $entity, array(
            //->add('depNombre')
            //->add('depNombre', 'text', array('required' => true))
        ));
        //$form->add('text', 'text');
        $form->add('submitss', 'submit', array('label' => 'Create'));
        //$form->add('submi', 'text');
        //$form->add('depNombre', 'text', array('required' => true));

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
