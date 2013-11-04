<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para el login de la aplicacion.
 * 
 * @Route("/instrumentos")
 * @package CuentaBundle/Controller
 */
class InstrumentosController extends Controller
{
    /**
     * Accion para mostrar la lista de instrumentos creados y formulario de creacion
     * 
     * @Route("/", name="instrumentos")
     * @Template("sgiiBundle:Instrumentos:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function indexAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $inst_serv = $this->get('instrumentos');
        
        // Create form
        $form = $this->createInstrumentoForm(); 
        $proyectos = $inst_serv->getProyectos();
        
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $instrumento = new \sgii\sgiiBundle\Entity\TblHerramienta();
                
                $estado = (!empty($data['estado'])) ? 1 : 0;
                $fechaInicio = (!empty($data['fechaInicio'])) ? new \DateTime($data['fechaInicio']) : null;
                $fechaFin = (!empty($data['fechaFin'])) ? new \DateTime($data['fechaFin']) : null;
                
                $instrumento->setHerNombreHerramienta($data['nombre']);
                $instrumento->setHerEstado($estado);
                $instrumento->setProyecto($data['proyecto']);
                $instrumento->setTipoHerramienta($data['tipoInstrumento']);
                $instrumento->setHerFechaInicio($fechaInicio);
                $instrumento->setHerFechaFin($fechaFin);
                
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($instrumento);
                $em->flush();
                
                $security->setAuditoria('Nuevo instrumento: '.$instrumento->getId());
                
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Instrumento creado correctamente"));
                return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$instrumento->getId())));
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        
        return array(
            'form'=>$form->createView(), 
            'proyectos' => $proyectos
        );
    }
    
    /**
     * Funcion para crear el formulario de creacion y edicion de instrumentos
     * 
     * @return Object formulario
     */
    private function createInstrumentoForm($data = array())
    {
        $inst_serv = $this->get('instrumentos');
        
        $tiposInstrumento = $inst_serv->getTiposInstrumento();
        
        // adaptar arreglos para formulario del tipo id=>nombre       
        $choice_tiposInstrumento = array();
        foreach($tiposInstrumento as $ti)
        {
            $choice_tiposInstrumento[$ti['id']] = $ti['theNombreHerramienta'];
        }
        
        if(count($data))
        {
            $instrumento = $data;
        }
        else
        {
            $instrumento = array(
                'nombre' => null,
                'fechaInicio' => null,
                'fechaFin' => null,
                'estado' => null,
                'tipoInstrumento' => null,
                'proyecto' => null
            );
        }
        
        $form = $this->createFormBuilder($instrumento)  
            ->add('nombre', 'text', array('required' => true))
            ->add('fechaInicio', 'text', array('required' => false))
            ->add('fechaFin', 'text', array('required' => false))
            ->add('estado', 'text', array('required' => false))
            ->add('tipoInstrumento', 'choice', array('required' => true, 'choices' => $choice_tiposInstrumento))
            ->add('proyecto', 'text', array('required' => false))
            ->getForm(); 
        
        return $form;
    }
    
    /**
     * Accion para la pagina principal de un instrumento
     * 
     * @Route("/{id}/show", name="show_instrumento")
     * @Template("sgiiBundle:Instrumentos:show.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function showAction($id)
    {
        
        
        
        return array(
            
        );
    }
    
    /**
     * Accion para editar un instrumento
     * 
     * @Route("/{id}/edit", name="edit_instrumento")
     * @Template("sgiiBundle:Instrumentos:edit.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return Resonse
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        
        $instrumento = $em->getRepository('sgiiBundle:TblHerramienta')->findOneById($id);        
        
        $inst_serv = $this->get('instrumentos');
        
        // Create form
        $fechaInicio = (!empty($instrumento->getHerFechaInicio())) ? $instrumento->getHerFechaInicio()->format('Y-m-d') : null;
        $fechaFin = (!empty($instrumento->getHerFechaFin())) ? $instrumento->getHerFechaFin()->format('Y-m-d') : null;
        $form = $this->createInstrumentoForm(array(
            'nombre' => $instrumento->getHerNombreHerramienta(),
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'estado' => $instrumento->getHerEstado(),
            'tipoInstrumento' => $instrumento->getTipoHerramienta(),
            'proyecto' => $instrumento->getProyecto()
        )); 
        $proyectos = $inst_serv->getProyectos();        
        
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $estado = (!empty($data['estado'])) ? 1 : 0;
                $fechaInicio = (!empty($data['fechaInicio'])) ? new \DateTime($data['fechaInicio']) : null;
                $fechaFin = (!empty($data['fechaFin'])) ? new \DateTime($data['fechaFin']) : null;
                
                $instrumento->setHerNombreHerramienta($data['nombre']);
                $instrumento->setHerEstado($estado);
                $instrumento->setProyecto($data['proyecto']);
                $instrumento->setTipoHerramienta($data['tipoInstrumento']);
                $instrumento->setHerFechaInicio($fechaInicio);
                $instrumento->setHerFechaFin($fechaFin);
                
                $em = $this->getDoctrine()->getManager();
                
                $em->persist($instrumento);
                $em->flush();
                
                $security->setAuditoria('Edicion instrumento: '.$instrumento->getId());
                
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Instrumento editado correctamente"));
                return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$instrumento->getId())));
            }
        }
        
        return array(
            'form'=>$form->createView(), 
            'proyectos' => $proyectos,
            'instrumento' => $instrumento
        );
    }
}
?>