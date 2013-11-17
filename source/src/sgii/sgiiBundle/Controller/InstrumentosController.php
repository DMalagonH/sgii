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
            'form' => $form->createView(), 
            'proyectos' => $proyectos,
            'instrumentos' => $instrumentos
        ); 
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
                    
                    if($data['tipoPregunta'] != 1) // Cerradas
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
        $usuarios = $inst_serv->getUsuariosInstrumento($id);
        
        return array(
            'instrumento' => $instrumento,
            'form' => $form->createView(),
            'preguntas' => $preguntas,
            'usuarios' => $usuarios,
            'duplicar_form' => $this->createDuplicarForm()->createView()
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
        if(!$this->getRequest()->isXmlHttpRequest()) {throw $this->createNotFoundException();}
        
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
                    if($pregunta->getTipoPregunta() != 1) // Cerradas
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
     * @Method({"POST"})
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $pid id de pregunta
     */
    public function deletePreguntaAction($pid)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        if(!$this->getRequest()->isXmlHttpRequest()) {throw $this->createNotFoundException();}
        
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
    
    /**
     * Accion para buscar usuarios
     * 
     * @Route("/{id}/buscar", name="buscar_instrumento")
     * @Template("sgiiBundle:Instrumentos:invitar.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param Request $request
     * @param $id id de instrumento
     * @return Resonse
     */
    public function buscarUsuariosAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $form = $this->createBusquedaForm();
        
        $usuarios = false;
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                
                $inst_serv = $this->get('instrumentos');
                
                $usuarios = $inst_serv->buscarUsuario($data, $id, 'OR');
            }
        }
        
        $em = $this->getDoctrine()->getManager();
        $instrumento = $em->getRepository("sgiiBundle:TblHerramienta")->findOneById($id);
        
        return array(
            'instrumento' => $instrumento,
            'form' => $form->createView(),
            'usuarios' => $usuarios
        );
    }
    
    /**
     * Accion para invitar usuarios a un instrumento
     * 
     * @Route("/{id}/invitar", name="invitar_instrumento")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param Request $request
     * @param $id id de instrumento
     * @return Response
     */
    public function invitarUsuariosAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        if($request->getMethod() == 'POST')
        {
            $usuarios = $request->get('usuarios');
            $form = $request->get('form');
                        
            if(count($usuarios)>0)
            {
                $validate = $this->get('validate');
                
                $val['ini'] = $validate->validateDateFormat($form['ini'], 'yyyy-mm-dd', false);
                $val['fin'] = $validate->validateDateFormat($form['fin'], 'yyyy-mm-dd', false);
                
                if($val['ini'] && $val['fin'])
                {
                    $em = $this->getDoctrine()->getManager();
                    $instrumento = $em->getRepository("sgiiBundle:TblHerramienta")->findOneById($id);
                    
                    $fecIni = null;
                    $fecFin = null;
                                        
                    if(!empty($form['ini'])) $fecIni = new \DateTime($form['ini']);
                    if(!empty($form['fin'])) $fecFin = new \DateTime($form['fin']." 23:59:59");
                    
                    $emails = array();
                    foreach($usuarios as $u)
                    {
                        $usuario = $em->getRepository("sgiiBundle:TblUsuario")->findOneById($u);

                        $usu_inst = $em->getRepository("sgiiBundle:TblUsuarioHerramienta")->findOneBy(array('herramienta'=>$instrumento,'usuario'=>$usuario));

                        if(!$usu_inst)
                        {
                            $usu_inst = new \sgii\sgiiBundle\Entity\TblUsuarioHerramienta();

                            $usu_inst->setHerramienta($instrumento);
                            $usu_inst->setUsuario($usuario);
                            $usu_inst->setUshAplico(0);
                            $usu_inst->setUshFechaActivoInicio($fecIni);
                            $usu_inst->setUshFechaActivoFin($fecFin);

                            $em->persist($usu_inst);

                            $emails[]=$usuario->getUsuLog();
                        }
                    }

                    $em->flush();

                    //Enviar notificacion de correo
                    $this->enviarNotificacionInvitacion($emails, $instrumento, $form);


                    $security->setAuditoria('Invito usuarios al instrumento: '.$id);
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Invitaciones enviadas correctamente"));

                    return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$id)));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Formato de fechas incorrecto"));
                    return $this->redirect($this->generateUrl('buscar_instrumento', array('id'=>$id)));
                }
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Debe seleccionar al menos un usuario"));
                return $this->redirect($this->generateUrl('buscar_instrumento', array('id'=>$id)));
            }
        }
        
        return new Response();
    }
        
    /**
     * Accion para cambiar las fechas de restriccion de participacion
     * de los usuarios en el instrumento 
     * 
     * @Route("/{id}/edit_usuarios", name="restricciones_instrumento")
     * @Template("sgiiBundle:Instrumentos:restricciones.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param Request $request
     * @param $id id de instrumento
     * @return Response
     */
    public function editRestriccionesAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $inst_serv = $this->get('instrumentos');        
        
        $instrumento = $em->getRepository("sgiiBundle:TblHerramienta")->findOneById($id);
        
        if($request->getMethod() == 'POST')
        {
            $form_usuarios = $request->get('usuarios');
            $form = $request->get('form');
            
            if(count($form_usuarios)>0)
            {
                $validate = $this->get('validate');
                
                $val['ini'] = $validate->validateDateFormat($form['ini'], 'yyyy-mm-dd', false);
                $val['fin'] = $validate->validateDateFormat($form['fin'], 'yyyy-mm-dd', false);
                
                
                if($val['ini'] && $val['fin'])
                {
                    $fecIni = null;
                    $fecFin = null;
                                        
                    if(!empty($form['ini'])) $fecIni = $form['ini']." 00:00:00";
                    if(!empty($form['fin'])) $fecFin = $form['fin']." 23:59:59";
                    
                    $where = implode(" OR uh.usuario = ", $form_usuarios);
                    
                    $dql = "UPDATE sgiiBundle:TblUsuarioHerramienta uh
                            SET uh.ushFechaActivoInicio = :fechaIni, uh.ushFechaActivoFin = :fechaFin
                            WHERE 
                                uh.herramienta = :instrumentoId
                                AND (uh.ushAplico = 0 OR uh.ushAplico IS NULL)
                                AND (uh.usuario = ".$where.") ";                    
                    
                    $query = $em->createQuery($dql);
                    $query->setParameter('instrumentoId', $id);  
                    $query->setParameter('fechaIni', $fecIni);  
                    $query->setParameter('fechaFin', $fecFin);  

                    $query->getResult();
                    
                    $security->setAuditoria('Cambio de restricciones en el instrumento: '.$id);
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Actualización realizada correctamente"));
                }
                else
                {
                    $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Formato de fechas incorrecto"));
                }
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Debe seleccionar al menos un usuario"));            
            }
        }
        
        $usuarios = $inst_serv->getUsuariosInstrumento($id);
        
        return array(
            'instrumento' => $instrumento,
            'usuarios' => $usuarios,
        );
    }
    
    /**
     * Accion ajax para eliminar un usuario de un instrumento
     * 
     * @Route("/{iid}/{uid}/delete_usuario_instrumento", name="delete_usuario_instrumento")
     * @Method({"POST"})
     * @param integer $iid id de instrumento
     * @param integer $uid id de usuario
     */
    public function deleteUsuarioAction($iid, $uid)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        if(!$this->getRequest()->isXmlHttpRequest()) {throw $this->createNotFoundException();}
        
        $inst_serv = $this->get('instrumentos');
        
        $del = $inst_serv->deleteUsuarioInstrumento($iid, $uid);   
        
        if($del)
        {
            $security->setAuditoria('Eliminación de usuario '. $uid .' en instrumento: '.$iid);
            print(json_encode(array(
               'status' => 'success', 
               'message' => 'Usuario eliminado correctamente' 
            )));
        }
        else
        {
            print(json_encode(array(
               'status' => 'warning', 
               'message' => 'El usuario no se puede eliminar porque ya participo en el instrumento.' 
            )));            
        }
        
        return new Response();
    }

    /**
     * Accion para duplicar un instrumento
     * 
     * @Route("/{id}/duplicar", name="duplicar_instrumento")
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $id id de instrumento
     */
    public function duplicarAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $form = $this->createDuplicarForm();
        
        if($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $inst_serv = $this->get('instrumentos');
                
                // Consultar contenido del instrumento a duplicar
                $instrumento = $em->getRepository("sgiiBundle:TblHerramienta")->findOneById($id);                
                $preguntas = $inst_serv->getPreguntasInstrumento($id);
                
                
                // Crear nuevo instrumento
                $newInstrumento = new \sgii\sgiiBundle\Entity\TblHerramienta();
                $newInstrumento->setHerNombreHerramienta($instrumento->getHerNombreHerramienta());
                $newInstrumento->setHerEstado($instrumento->getHerEstado());
                $newInstrumento->setTipoHerramienta($instrumento->getTipoHerramienta());
                $newInstrumento->setProyecto($data['proyecto']);
                
                $em->persist($newInstrumento);
                $em->flush();
                
                // Recorrer preguntas y duplicarlas
                foreach($preguntas as $p)
                {
                    $newPregunta = new \sgii\sgiiBundle\Entity\TblPregunta();
                    $newPregunta->setPrePregunta($p['prePregunta']);
                    $newPregunta->setPreObligatoria($p['preObligatoria']);
                    $newPregunta->setPreEstado($p['preEstado']);
                    $newPregunta->setPreOrden($p['preOrden']);
                    $newPregunta->setHerramienta($newInstrumento->getId());
                    $newPregunta->setTipoPregunta($p['tipoId']);
                    
                    $em->persist($newPregunta);
                    $em->flush();
                    
                    if(isset($p['opciones']))
                    {
                        foreach($p['opciones'] as $opc)
                        {
                            $newOpcion = new \sgii\sgiiBundle\Entity\TblRespuesta();
                            $newOpcion->setResRespuesta($opc['resRespuesta']);
                            $newOpcion->setResPeso($opc['resPeso']);
                            $newOpcion->setResEstado($opc['resEstado']);
                            $newOpcion->setPregunta($newPregunta->getId());
                            
                            $em->persist($newOpcion);
                        }
                        $em->flush();
                    }
                }
                
                $security->setAuditoria('Duplicación de instrumento: '.$id.", nuevo instrumento: ".$newInstrumento->getId());
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "success", "text" => "Instrumento duplicado correctamente"));
                   
            }
            else
            {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }
        
        return $this->redirect($this->generateUrl('show_instrumento', array('id'=>$id)));
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
     * Funcion para crear el formulario de busqueda de usuarios
     * 
     * @return Object formulario
     */
    private function createBusquedaForm()
    {
        $queries = $this->get('queries');
        
        $cargos = array(''=>'Ninguno') + $queries->getCargosArray();
        $niveles = array(''=>'Ninguno') + $queries->getNivelesArray();
        $departamentos = array(''=>'Ninguno') + $queries->getDepartamentosArray();
        $organizaciones = array(''=>'Ninguno') + $queries->getOrganizacionesArray();
        
        $data = array(
            'nombre' => null,
            'apellido' => null,
            'email' => null,
            'cargo' => null,
            'nivel' => null,
            'departamento' => null,
            'organizacion' => null
        );
        
        $form = $this->createFormBuilder($data)  
            ->add('nombre', 'text', array('required' => false))
            ->add('apellido', 'text', array('required' => false))
            ->add('email', 'email', array('required' => false))
            ->add('cargo', 'choice', array('required' => false, 'choices' => $cargos))
            ->add('nivel', 'choice', array('required' => false, 'choices' => $niveles))
            ->add('departamento', 'choice', array('required' => false, 'choices' => $departamentos))
            ->add('organizacion', 'choice', array('required' => false, 'choices' => $organizaciones))
            ->getForm(); 
        
        return $form;
    }
    
    /**
     * Funcion para enviar notificacion por correo cuando se invitan usuarios a instrumentos
     * 
     * @param array $emails arreglo de emails 
     * @param Object $instrumento entidad instrumento
     * @param array $data datos del formulario de invitacion
     */
    private function enviarNotificacionInvitacion($emails, $instrumento, $data)
    {
        $mailer = $this->get('mail');
        
        $subject = 'Te han invitado a participar en '.$instrumento->getHerNombreHerramienta();
        
        $body = '';
        
        if(!empty($data['ini']) || !empty($data['fin']))
        {
            $body .= 'Podrás participar';
            if(!empty($data['ini']))
            {
                $body .= ' desde '.$data['ini'];
            }
            if(!empty($data['fin']))
            {
                $body .= ' hasta '.$data['fin'];
            }
            $body .= '<br/><br/>';
        }
        
        $body .= 'Para participar haz click en el siguiente enlace: ';
        
        $link = $this->get('request')->getSchemeAndHttpHost().$this->get('router')->generate('login');
        
        $dataRender = array(
            'title' => $subject,
            'body' => $body,
            'link' => $link,
            'link_text' => 'Ingresar'
        );
        
        $mailer->sendMail($emails, $subject, $dataRender, 'bcc');
    }
    
    /**
     * Funcion para crear el formulario de duplicacion de instrumento
     * 
     * @return Object formulario
     */
    private function createDuplicarForm()
    {
        $inst_serv = $this->get('instrumentos');
        $proyectos = $inst_serv->getProyectos();
        $choice_proyectos = array();
        
        foreach($proyectos as $p)
        {
            $choice_proyectos[$p['id']] = $p['proNombre'];
        }    
        
        $data = array(
            'proyecto' => null
        );
        
        $form = $this->createFormBuilder($data)
            ->add('proyecto', 'choice', array('required' => true, 'choices' => $choice_proyectos))
            ->getForm();
        
        return $form;
    }
}   

?>