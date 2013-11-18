<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblEstadoProyecto;
use sgii\sgiiBundle\Form\TblEstadoProyectoType;

/**
 * TblEstadoProyecto controller.
 * @package sgiiBundle/Controller
 * @Route("/estadoproyecto")
 */
class TblEstadoProyectoController extends Controller
{
    /**
     * Listado de los estados de proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Template("sgiiBundle:TblEstadoProyecto:index.html.twig")
     * @Route("/", name="estadoproyecto")
     * @Method("GET")
     * @return Render ViewRender de estados de proyecto
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('sgiiBundle:TblEstadoProyecto')->findAll();
        return array( 'entities' => $entities );
    }
    
    /**
     * Ver detalles del estado de proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del estado de proyecto
     * @return Render Vista renderizada con detalles del estado de proyecto
     * @Template("sgiiBundle:TblEstadoProyecto:show.html.twig")
     * @Route("/{id}/show", name="estadoproyecto_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblEstadoProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblEstadoProyecto entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Agregar Estado de proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nuevo estado de proyecto
     * @return Render Formulario de nuevo estado de proyecto
     * @Template("sgiiBundle:TblEstadoProyecto:new.html.twig")
     * @Route("/new", name="estadoproyecto_new")
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entity = new TblEstadoProyecto();
        $form  = $this->createForm(new TblEstadoProyectoType(), $entity);
        
        if ($request->getMethod() == "POST")
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                
                $security->setAuditoria('Nuevo estado de proyecto: '.$entity->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nueva Estado de proyecto agregado"));
                return $this->redirect($this->generateUrl('estadoproyecto_show', array('id' => $entity->getId())));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Editar estado de proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form del estado de proyecto
     * @return Render Formulario del estado de proyecto
     * @Template("sgiiBundle:TblEstadoProyecto:edit.html.twig")
     * @Route("/{id}/edit", name="estadoproyecto_edit")
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblEstadoProyecto')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblEstadoProyecto entity.');
        }

        $editForm = $this->createForm(new TblEstadoProyectoType(), $entity);
        //$deleteForm = $this->createDeleteForm($id);
        
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isValid()) 
            {
                $em->flush();

                $security->setAuditoria('Editar estado de proyecto: '.$id);
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El estado de proyecto ha sido editado correctamente"));
                return $this->redirect($this->generateUrl('estadoproyecto_show', array('id' => $id)));
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
     * Borrar un estado de proyecto
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar del estado de proyecto
     * @param Int $id Id del estado de proyecto
     * @return Redirect Redirigir a listado de estado de proyecto
     * @Route("/{id}", name="estadoproyecto_delete")
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
            $entity = $em->getRepository('sgiiBundle:TblEstadoProyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblEstadoProyecto entity.');
            }
            
            $cantidad = $this->get('queries')->getCountEstadosProyecto($id);
            if ($cantidad == 0) {
                $em->remove($entity);
                $em->flush();

                $security->setAuditoria('Eliminar estado de proyecto: '.$id. " - ".$entity->getEprEstadoProyecto());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El estado de proyecto ha sido eliminado correctamente"));
            } else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "El estado de proyecto no se puede eliminar porque hay proyectos con este."));
            }
        }
        return $this->redirect($this->generateUrl('estadoproyecto'));
    }

    /**
     * Creación de formulario para eliminar un estado de proyecto
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del estado de proyecto
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadoproyecto_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirmep')))
            ->getForm()
        ;
    }
}