<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblDepartamento;
use sgii\sgiiBundle\Form\TblDepartamentoType;

/**
 * Controlador de departamentos/areas
 * @package sgiiBundle/Controller
 * @Route("/departamento")
 */
class TblDepartamentoController extends Controller
{
    /**
     * Listado de departamentos
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de departamentos
     * @Template("sgiiBundle:TblDepartamento:index.html.twig")
     * @Route("/", name="departamento")
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('sgiiBundle:TblDepartamento')->findAll();
        return array( 'entities' => $entities );
    }

    /**
     * Ver detalles del departamento
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @param Int $id Id del departamento
     * @return Render Vista renderizada con detalles del departamento
     * @Template("sgiiBundle:TblDepartamento:show.html.twig")
     * @Route("/{id}/show", name="departamento_show")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblDepartamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblDepartamento entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }
    
    /**
     * Agregar departamento
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nuevo departamento
     * @return Render Formulario de nuevo departamento
     * @Template("sgiiBundle:TblDepartamento:new.html.twig")
     * @Route("/new", name="departamento_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}

        $entity = new TblDepartamento();
        $form  = $this->createForm(new TblDepartamentoType(), $entity);
        
        if ($request->getMethod() == "POST")
        {
            $form->bind($request);
            if ($form->isValid()) 
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($entity);
                $em->flush();
                
                $security->setAuditoria('Nuevo departamento: '.$entity->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nuevo departamento agregado"));
                return $this->redirect($this->generateUrl('departamento_show', array('id' => $entity->getId())));
            }
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    
    /**
     * Editar departamento
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form del departamento a editar
     * @return Render Formulario del departamento a editar
     * @Template("sgiiBundle:TblDepartamento:edit.html.twig")
     * @Route("/{id}/edit", name="departamento_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('sgiiBundle:TblDepartamento')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblDepartamento entity.');
        }

        $editForm = $this->createForm(new TblDepartamentoType(), $entity);
        //$deleteForm = $this->createDeleteForm($id);
        
        if ($request->getMethod() == 'POST')
        {
            $editForm->bind($request);
            if ($editForm->isValid()) 
            {
                $em->flush();
                
                $security->setAuditoria('Editar departamento: '.$id);
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El departamento ha sido editado correctamente"));
                return $this->redirect($this->generateUrl('departamento_show', array('id' => $id)));
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
     * Borrar una departamento
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar del departamento
     * @param Int $id Id del departamento a eliminar
     * @return Redirect Redirigir a listado de departamento
     * @Route("/{id}", name="departamento_delete")
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
            $entity = $em->getRepository('sgiiBundle:TblDepartamento')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblDepartamento entity.');
            }
            
            $cantidad = $this->get('queries')->getCountDepartamento($id);
            if ($cantidad == 0) {
                $em->remove($entity);
                $em->flush();

                $security->setAuditoria('Eliminar departamento: '.$id. " - ".$entity->getDepNombre());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El departamento ha sido eliminado correctamente"));
            } else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "El departamento no se puede eliminar porque hay usuarios que pertenecen a este"));
            }
        }

        return $this->redirect($this->generateUrl('departamento'));
    }

    /**
     * Creación de formulario para eliminar un departamento
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del departamento
     * @return \Symfony\Component\Form\Form Formulario de eliminacion
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('departamento_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirm')))
            ->getForm();
    }
}