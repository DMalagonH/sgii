<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblLineaInvestigacion;
use sgii\sgiiBundle\Form\TblLineaInvestigacionType;

/**
 * Controlador para linea de investigacion
 * @package sgiiBundle/Controller
 * @Route("/lineainvestigacion")
 */
class TblLineaInvestigacionController extends Controller
{
    /**
     * Listado de tipos de investigacion registrados
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de lineas de investigacion
     * @Template("sgiiBundle:TblLineaInvestigacion:index.html.twig")
     * @Route("/", name="lineainvestigacion")
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('sgiiBundle:TblLineaInvestigacion')->findAll();
        return array( 'entities' => $entities );
    }
    
    /**
     * Ver detalles de la linea de de investigación
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @param Int $id Id de la línea de investigación
     * @return Render Vista renderizada con detalles de la línea de investigación
     * @Template("sgiiBundle:TblLineaInvestigacion:show.html.twig")
     * @Route("/{id}/show", name="lineainvestigacion_show")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblLineaInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblLineaInvestigacion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Agregar línea de investigacion
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nueva línea de investigación
     * @return Render Formulario de nueva línea de investigación
     * @Template("sgiiBundle:TblLineaInvestigacion:new.html.twig")
     * @Route("/new", name="lineainvestigacion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $entity = new TblLineaInvestigacion();
        $form  = $this->createForm(new TblLineaInvestigacionType(), $entity);
        
        if ($request->getMethod() == "POST")
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                
                $security->setAuditoria('Nueva linea de investigación: '.$entity->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nueva línea de investigacion agregado"));
                return $this->redirect($this->generateUrl('lineainvestigacion_show', array('id' => $entity->getId())));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Editar línea de investigacion
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de la línea de investigación a editar
     * @return Render Formulario de la línea de investigación a editar
     * @Template("sgiiBundle:TblLineaInvestigacion:edit.html.twig")
     * @Route("/{id}/edit", name="lineainvestigacion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblLineaInvestigacion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblLineaInvestigacion entity.');
        }

        $editForm = $this->createForm(new TblLineaInvestigacionType(), $entity);
        //$deleteForm = $this->createDeleteForm($id);
        
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isValid()) 
            {
                $em->flush();
                
                $security->setAuditoria('Editar línea de investigación: '.$id);
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "La línea de investigacion ha sido editado correctamente"));
                return $this->redirect($this->generateUrl('lineainvestigacion_show', array('id' => $id)));
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
     * Borrar una línea de investigacion
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar de la línea de investigación
     * @param Int $id Id de la línea de investigacion a eliminar
     * @return Redirect Redirigir a listado de líneas de investigación
     * @Route("/{id}", name="lineainvestigacion_delete")
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
            $entity = $em->getRepository('sgiiBundle:TblLineaInvestigacion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblLineaInvestigacion entity.');
            }
            
            $cantidad = $this->get('queries')->getCountLineaInvestigacion($id);
            if ($cantidad == 0) {
                $em->remove($entity);
                $em->flush();

                $security->setAuditoria('Eliminar línea de investigación: '.$id. " - ".$entity->getLinNombreInvestigacion());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "La línea de investigación ha sido eliminado correctamente"));
            } else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "La linea de investigación no se puede eliminar porque hay proyectos con esta."));
            }
        }
        return $this->redirect($this->generateUrl('lineainvestigacion'));
    }

    /**
     * Creación de formulario para eliminar una línea de investigación
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id de la línea de investigación
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lineainvestigacion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirmtp')))
            ->getForm();
    }
}