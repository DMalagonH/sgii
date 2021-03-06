<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblTipoInvestigacion;
use sgii\sgiiBundle\Form\TblTipoInvestigacionType;

/**
 * Controlador para tipo de investigacion
 * @package sgiiBundle/Controller
 * @Route("/tipoinvestigacion")
 */
class TblTipoInvestigacionController extends Controller
{
    /**
     * Listado de tipos de investigacion registrados
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de tipos de investigacion
     * @Template("sgiiBundle:TblTipoInvestigacion:index.html.twig")
     * @Route("/", name="tipoinvestigacion")
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('sgiiBundle:TblTipoInvestigacion')->findAll();
        return array( 'entities' => $entities );
    }
    
    /**
     * Ver detalles de un tipo de investigación
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @param Int $id Id del tipo de investigación
     * @return Render Vista renderizada con detalles de tipo de investigación
     * @Template("sgiiBundle:TblTipoInvestigacion:show.html.twig")
     * @Route("/{id}/show", name="tipoinvestigacion_show")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblTipoInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblTipoInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Agregar tipo de investigación
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nuevo tipo de investigación
     * @return Render Formulario de nuevo tipo de investigación
     * @Template("sgiiBundle:TblTipoInvestigacion:new.html.twig")
     * @Route("/new", name="tipoinvestigacion_new")
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $entity = new TblTipoInvestigacion();
        $form  = $this->createForm(new TblTipoInvestigacionType(), $entity);
        
        if ($request->getMethod() == "POST")
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                
                $security->setAuditoria('Nuevo tipo de investigación: '.$entity->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nuevo tipo de investigacion agregado"));
                return $this->redirect($this->generateUrl('tipoinvestigacion_show', array('id' => $entity->getId())));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Editar tipo de investigacion
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de tipo de investigación a editar
     * @return Render Formulario de tipo de investigación a editar
     * @Template("sgiiBundle:TblTipoInvestigacion:edit.html.twig")
     * @Route("/{id}/edit", name="tipoinvestigacion_edit")
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblTipoInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblTipoInvestigacion entity.');
        }

        $editForm = $this->createForm(new TblTipoInvestigacionType(), $entity);
        //$deleteForm = $this->createDeleteForm($id);
        
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isValid()) 
            {
                $em->flush();
                
                $security->setAuditoria('Editar tipo de investigación: '.$id);
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El tipo de investigacion ha sido editado correctamente"));
                return $this->redirect($this->generateUrl('tipoinvestigacion_show', array('id' => $id)));
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
     * Borrar un tipo de investigacion
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar tipo de investigación
     * @param Int $id Id del tipo de investigacion a eliminar
     * @return Redirect Redirigir a listado de tipos de investigación
     * @Route("/{id}", name="tipoinvestigacion_delete")
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
            $entity = $em->getRepository('sgiiBundle:TblTipoInvestigacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblTipoInvestigacion entity.');
            }
            
            $cantidad = $this->get('queries')->getCountTipoInvestigacion($id);
            if ($cantidad == 0) {
                $em->remove($entity);
                $em->flush();

                $security->setAuditoria('Eliminar tipo de investigación: '.$id. " - ".$entity->getTinNombreTipo());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El tipo de investigacion ha sido eliminado correctamente"));
            } else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "El tipo de investigación no se puede eliminar porque hay proyectos con este."));
            }
        }
        return $this->redirect($this->generateUrl('tipoinvestigacion'));
    }

    /**
     * Creación de formulario para eliminar un tipo de investigación
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del tipo de investigación
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipoinvestigacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirmtp')))
            ->getForm();
    }
}