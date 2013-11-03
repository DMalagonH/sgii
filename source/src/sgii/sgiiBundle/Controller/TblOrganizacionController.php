<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblOrganizacion;
use sgii\sgiiBundle\Form\TblOrganizacionType;

/**
 * Controlador de organizaciones
 * @package sgiiBundle/Controller
 * @Route("/organizacion")
 */
class TblOrganizacionController extends Controller
{
    /**
     * Listado de organizaciones
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de organización
     * @Template("sgiiBundle:TblOrganizacion:index.html.twig")
     * @Route("/", name="organizacion")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('sgiiBundle:TblOrganizacion')->findAll();
        return array( 'entities' => $entities );
    }
    
    /**
     * Ver detalles de la linea de de investigación
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @param Int $id Id de la organización
     * @return Render Vista renderizada con detalles de la organización
     * @Template("sgiiBundle:TblOrganizacion:show.html.twig")
     * @Route("/{id}/show", name="organizacion_show")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblOrganizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblOrganizacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Agregar organización
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nueva organización
     * @return Render Formulario de nueva organización
     * @Template("sgiiBundle:TblOrganizacion:new.html.twig")
     * @Route("/new", name="organizacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        
        $entity = new TblOrganizacion();
        $form  = $this->createForm(new TblOrganizacionType(), $entity);
        
        if ($request->getMethod() == "POST")
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                
                $security->setAuditoria('Nueva organización: '.$entity->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nueva organización agregado"));
                return $this->redirect($this->generateUrl('organizacion_show', array('id' => $entity->getId())));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Editar Organización
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de la organzación a editar
     * @return Render Formulario de la organización a editar
     * @Template("sgiiBundle:TblOrganizacion:edit.html.twig")
     * @Route("/{id}/edit", name="organizacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblOrganizacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblLineaInvestigacion entity.');
        }

        $editForm = $this->createForm(new TblOrganizacionType(), $entity);
        //$deleteForm = $this->createDeleteForm($id);
        
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isValid()) 
            {
                $em->flush();
                
                $security->setAuditoria('Editar organización: '.$id);
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "La órganización ha sido editado correctamente"));
                return $this->redirect($this->generateUrl('organizacion_show', array('id' => $id)));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            //'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Borrar una organización
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar organización
     * @param Int $id Id de la organización a eliminar
     * @return Redirect Redirigir a listado de organizaciones
     * @Route("/{id}", name="organizacion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $security = $this->get('security');
        
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('sgiiBundle:TblOrganizacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblOrganizacion entity.');
            }

            $em->remove($entity);
            $em->flush();
            
            $security->setAuditoria('Eliminar organización: '.$id. " - ".$entity->getOrgNombre());
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "La organización ha sido eliminado correctamente"));
        }

        return $this->redirect($this->generateUrl('organizacion'));
    }

    /**
     * Creación de formulario para eliminar una organización
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id de la organización
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('organizacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirmo')))
            ->getForm();
    }
}
