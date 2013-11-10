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
 * @author Diego Malagón <diego-software@hotmail.com>
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
        
        $instrumentos = $inst_serv->getInstrumentos();
        
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
            'proyectos' => $proyectos,
            'instrumentos' => $instrumentos
        ); 
    }
    
    /**
     * Funcion para crear el formulario de creacion y edicion de instrumentos
     * 
     * @param array $data datos precargados del formulario
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
                'estado' => true,
                'tipoInstrumento' => null,
                'proyecto' => null
            );
        }
        
        $form = $this->createFormBuilder($instrumento)  
            ->add('nombre', 'text', array('required' => true))
            ->add('fechaInicio', 'text', array('required' => false))
            ->add('fechaFin', 'text', array('required' => false))
            ->add('estado', 'checkbox', array('required' => false))
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
     * @param Request $request
     * @param $id id de instrumento
     * @return Resonse
     */
    public function showAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $inst_serv = $this->get('instrumentos');
        
        $instrumento = $inst_serv->getInstrumentos($id);
        
        $form = $this->createPreguntaForm();
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                $opciones = $request->get('opciones');             
                $pesos = $request->get('peso');
                
                $validate = $this->validatePreguntaFrom($data, $opciones);
                
                if($validate['validate'])
                {
                    $pregunta = new \sgii\sgiiBundle\Entity\TblPregunta();
                
                    $pregunta->setHerramienta($id);
                    $pregunta->setTipoPregunta($data['tipoPregunta']);
                    $pregunta->setPrePregunta($data['pregunta']);
                    $pregunta->setPreOrden($data['orden']);
                    $pregunta->setPreObligatoria($data['obligatoria']);
                    $pregunta->setPreEstado($data['estado']);

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($pregunta);
                    $em->flush();
                    
                    if($data['tipoPregunta'] == 2) // Cerradas
                    {                    
                        foreach($opciones as $ko => $o)
                        {
                            if(!empty($o))
                            {
                                $opcion = new \sgii\sgiiBundle\Entity\TblRespuesta();

                                $opcion->setPregunta($pregunta->getId()); 
                                $opcion->setResPeso($pesos[$ko]);
                                $opcion->setResEstado(1);
                                $opcion->setResRespuesta($o);

                                $em->persist($opcion);
                            }
                        }
                        $em->flush();
                    }
                    
                    $security->setAuditoria('Creación de pregunta: '.$pregunta->getId());
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Pregunta agregada correctamente"));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => $validate['message']));
                }
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        
        $preguntas = $inst_serv->getPreguntasInstrumento($id);
        
        return array(
            'instrumento' => $instrumento,
            'form' => $form->createView(),
            'preguntas' => $preguntas
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
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        
        $instrumento = $em->getRepository('sgiiBundle:TblHerramienta')->findOneById($id);        
        
        $inst_serv = $this->get('instrumentos');
        
        // Create form
        $fechaInicio = (is_object($instrumento->getHerFechaInicio())) ? $instrumento->getHerFechaInicio()->format('Y-m-d') : null;
        $fechaFin = (is_object($instrumento->getHerFechaFin())) ? $instrumento->getHerFechaFin()->format('Y-m-d') : null;
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
    
    /**
     * Accion para eliminar un instrumento
     * 
     * @Route("/{id}/delete", name="delete_instrumento")
     * @Method({"POST"})
     * @param integer $id id de instrumento
     */
    public function deleteAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $inst_serv = $this->get('instrumentos');
        
        $del = $inst_serv->deleteInstrumento($id);
        if($del)
        {
            $security->setAuditoria('Eliminación instrumento: '.$id);
            print(json_encode(array(
               'status' => 'success', 
               'message' => 'Instrumento eliminado correctamente' 
            )));
        }
        else
        {
            print(json_encode(array(
               'status' => 'warning', 
               'message' => 'El instrumento no se puede eliminar porque ya contiene respuestas de usuarios.' 
            )));
        }
        
        return new Response();
    }
    
    /**
     * Funcion para crear el formulario de preguntas
     * 
     * @param array $data datos precargados del formulario
     * @return type
     */
    private function createPreguntaForm($data = array())
    {
        $inst_serv = $this->get('instrumentos');
        
        $tiposPregunta = $inst_serv->getTiposPreguta();
        
        // adaptar arreglos para formulario del tipo id=>nombre       
        $choice_tiposPregunta = array();
        foreach($tiposPregunta as $tp)
        {
            $choice_tiposPregunta[$tp['id']] = $tp['tprTipoPregunta'];
        }
        
        if(count($data))
        {
            $pregunta = $data;
        }
        else
        {
            $pregunta = array(
                'pregunta' => null,
                'obligatoria' => true,
                'estado' => true,
                'orden' => 0,
                'tipoPregunta' => null
            );
        }
        
        $form = $this->createFormBuilder($pregunta)  
            ->add('pregunta', 'textarea', array('required' => true))
            ->add('obligatoria', 'checkbox', array('required' => false))
            ->add('estado', 'checkbox', array('required' => false))
            ->add('orden', 'number', array('required' => false))
            ->add('tipoPregunta', 'choice', array('required' => true, 'choices' => $choice_tiposPregunta))
            ->getForm(); 
        
        return $form;
    }
    
    /**
     * Funcion para validar el formulario de preguntas
     * 
     * @param array $data datos de formulario
     * @param array $opciones opciones de respuesta
     * @return array array con estado y mensaje de validacion
     */
    private function validatePreguntaFrom($data, $opciones)
    {
        $validate = array('validate'=>false, 'message'=>'');
        
        if($data['tipoPregunta'] == 2) // pregunta cerrada
        {
            if(count($opciones) >= 2)
            {
                $validate['validate'] = true;
            }
            else
            {
                $validate['message'] = 'Debe agregar al menos 2 opciones de respuesta';
            }
        }
        else
        {
            $validate['validate'] = true;
        }
    
        
        return $validate;
    }
    
    /**
     * Accion para editar una pregunta
     * 
     * @Route("/{pid}/{iid}/edit_pregunta", name="edit_pregunta")
     * @Template("sgiiBundle:Instrumentos:editPregunta.html.twig")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $pid id de pregunta
     * @param integer $iid id de instrumento
     */
    public function editPreguntaAction(Request $request, $pid, $iid)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $inst_serv = $this->get('instrumentos');
        
        $em = $this->getDoctrine()->getManager();
        $pregunta = $em->getRepository('sgiiBundle:TblPregunta')->findOneById($pid);
        
        $count = $inst_serv->countRespuestasUsuarios($pid);
        
        if($count > 0)
        {
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "warning", "text" => "La pregunta no se puede editar porque ya contiene respuestas de usuarios"));
            return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$pregunta->getHerramienta())));
        }
        
        $dataForm = array(
            'pregunta' => $pregunta->getPrePregunta(),
            'obligatoria' => $pregunta->getPreObligatoria(),
            'estado' => $pregunta->getPreEstado(),
            'orden' => $pregunta->getPreOrden(),
            'tipoPregunta' => $pregunta->getTipoPregunta()
        );
        
        $form = $this->createPreguntaForm($dataForm);
        
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                $opciones = $request->get('opciones');             
                $pesos = $request->get('peso');
                
                $validate = $this->validatePreguntaFrom($data, $opciones);
                
                if($validate['validate'])
                {
                    $pregunta->setPrePregunta($data['pregunta']);
                    $pregunta->setPreOrden($data['orden']);
                    $pregunta->setPreObligatoria($data['obligatoria']);
                    $pregunta->setPreEstado($data['estado']);

                    $em->persist($pregunta);
                    $em->flush();
                    
                    // Eliminar opciones de respuesta
                    $dql = "DELETE FROM sgiiBundle:TblRespuesta r WHERE r.pregunta = :preguntaId";
                    $query = $em->createQuery($dql);
                    $query->setParameter('preguntaId', $pid);
                    $query->getResult();
                    
                    // Registrar las nuevas opciones de respuesta
                    if($pregunta->getTipoPregunta() == 2) // Cerradas
                    {                    
                        foreach($opciones as $ko => $o)
                        {
                            if(!empty($o))
                            {
                                $opcion = new \sgii\sgiiBundle\Entity\TblRespuesta();

                                $opcion->setPregunta($pregunta->getId()); 
                                $opcion->setResPeso($pesos[$ko]);
                                $opcion->setResEstado(1);
                                $opcion->setResRespuesta($o);

                                $em->persist($opcion);
                            }
                        }
                        $em->flush();
                    }
                    $security->setAuditoria('Edición de pregunta: '.$pregunta->getId());
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Pregunta editada correctamente"));
                    return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$pregunta->getHerramienta())));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => $validate['message']));
                }
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        
        $opciones = $inst_serv->getOpcionesPregunta($pid);
        
        return array(
            'pid' => $pid,
            'iid' => $iid,
            'form' => $form->createView(),
            'opciones' => $opciones
        );
    }
        
    /**
     * Accion ajax para eliminar una pregunta
     * 
     * @Route("/{pid}/delete_pregunta", name="delete_pregunta")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $pid id de pregunta
     */
    public function deletePreguntaAction($pid)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
                
        $inst_serv = $this->get('instrumentos');
        
        $del = $inst_serv->deletePregunta($pid);        
        
        if($del)
        {
            $security->setAuditoria('Eliminación pregunta: '.$pid);
            print(json_encode(array(
               'status' => 'success', 
               'message' => 'Pregunta eliminada correctamente' 
            )));
        }
        else
        {
            print(json_encode(array(
               'status' => 'warning', 
               'message' => 'La pregunta no se puede eliminar porque ya contiene respuestas de usuarios.' 
            )));            
        }
        
        return new Response();
    }
}   
?>