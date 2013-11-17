<?php

namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use sgii\sgiiBundle\Entity\TblProyecto;
use sgii\sgiiBundle\Entity\TblUsuarioProyecto;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Controlador de Proyectos
 * @package sgiiBundle/Controller
 * @Route("/proyectos")
 */
class TblProyectoController extends Controller
{
    /**
     * Listado de proyectos
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de proyectos
     * @Template("sgiiBundle:TblProyecto:index.html.twig")
     * @Route("/", name="proyectos")
     */
    public function indexAction()
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entities = $this->get('queries')->getProyectos();
        return array( 'entities' => $entities );
    }

    /**
     * Ver detalles del proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del proyecto
     * @return Render Vista renderizada con detalles del proyecto
     * @Template("sgiiBundle:TblProyecto:show.html.twig")
     * @Route("/{id}/show", name="proyectos_show")
     * @Method("GET")
     */
    public function showAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entity = $this->get('queries')->getProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblProyecto entity.');
        }
        
        $integrantes = $this->get('queries')->getUsuariosProyecto($id);

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'integrantes' => $integrantes,
        );
    }

    /**
     * Agregar proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de nuevo proyecto
     * @return Render Formulario de nuevo proyecto
     * @Template("sgiiBundle:TblProyecto:new.html.twig")
     * @Route("/new", name="proyectos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        //$entity = new TblProyecto();
        $form   = $this->proyectoForm();
        
        if ($request->getMethod() == "POST") 
        {
            $form->bind($request);
            if ($form->isvalid()) {
                $dataForm = $form->getData();
                $errores = $this->validateFormProyecto($dataForm);
                    if ($errores == 0) {
                        
                        $usuarioId = $security->getSessionValue('id');
                        $nPry = new TblProyecto();
                        $nPry->setProNombre($dataForm['proNombre']);
                        $nPry->setProDescripcion($dataForm['proDescripcion']);
                        $nPry->setProProblema($dataForm['proProblema']);
                        $nPry->setProConclusiones($dataForm['proConclusiones']);
                        $nPry->setProDemostraciones($dataForm['proDemostraciones']);
                        $nPry->setProDemostraciones($dataForm['proDemostraciones']);
                        $nPry->setProRecomendaciones($dataForm['proRecomendaciones']);
                        $nPry->setProEstado($dataForm['proEstado']);
                        $nPry->setEstadoProyectoId($dataForm['estadoProyectoId']);
                        $nPry->setTipoInvestigacionId($dataForm['tipoInvestigacionId']);
                        $nPry->setLineaInvestigacionId($dataForm['lineaInvestigacionId']);
                        $nPry->setProFechaCreacion(new \DateTime());
                        $nPry->setUsuarioId($usuarioId);
                        
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($nPry);
                        $em->flush();
                        
                        $nUserPry = New TblUsuarioProyecto();
                        $nUserPry->setProyectoId($nPry->getId());
                        $nUserPry->setUsuarioId($usuarioId);
                        $nUserPry->setUsuarioProyectoTipo('Investigador');
                        $em->persist($nUserPry);
                        $em->flush();
                        
                        $security->setAuditoria('Nuevo Proyecto: '.$nPry->getId());
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Nuevo proyecto registrado"));  
                        return $this->redirect($this->generateUrl('proyectos_show', array('id' => $nPry->getId())));
                    }
                    else {
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
                    }
            }
            else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }

        return array(
            //'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Editar proyecto
     *
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form del proyecto a editar
     * @return Render Formulario del proyecto a editar
     * @Template("sgiiBundle:TblProyecto:edit.html.twig")
     * @Route("/{id}/edit", name="proyectos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $em = $this->getDoctrine()->getManager();
        $nPry = $em->getRepository('sgiiBundle:TblProyecto')->find($id);
        
        if (!$nPry) {
            throw $this->createNotFoundException('Unable to find TblProyecto entity.');
        }
        
        $form = $this->proyectoForm($nPry);
        
        if ($request->getMethod() == "POST") 
        {
            $form->bind($request);
            if ($form->isvalid()) {
                $dataForm = $form->getData();
                $errores = $this->validateFormProyecto($dataForm);
                    if ($errores == 0) {
                        $nPry->setProNombre($dataForm['proNombre']);
                        $nPry->setProDescripcion($dataForm['proDescripcion']);
                        $nPry->setProProblema($dataForm['proProblema']);
                        $nPry->setProConclusiones($dataForm['proConclusiones']);
                        $nPry->setProDemostraciones($dataForm['proDemostraciones']);
                        $nPry->setProDemostraciones($dataForm['proDemostraciones']);
                        $nPry->setProRecomendaciones($dataForm['proRecomendaciones']);
                        $nPry->setProEstado($dataForm['proEstado']);
                        $nPry->setEstadoProyectoId($dataForm['estadoProyectoId']);
                        $nPry->setTipoInvestigacionId($dataForm['tipoInvestigacionId']);
                        $nPry->setLineaInvestigacionId($dataForm['lineaInvestigacionId']);
                        
                        $em = $this->getDoctrine()->getEntityManager();
                        $em->persist($nPry);
                        $em->flush();
                        
                        $security->setAuditoria('Editar Proyecto: '.$nPry->getId());
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "Proyecto editado correctamente"));
                        return $this->redirect($this->generateUrl('proyectos_show', array('id' => $nPry->getId())));
                    }
                    else {
                        $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
                    }
            }
            else {
                $this->get('session')->getFlashBag()->add('alerts', array("type" => "error", "text" => "Verifique los datos ingresados"));
            }
        }

        return array(
            'entity' => $nPry,
            'form'   => $form->createView(),
        );
    }

    /**
     * Borrar un proyecto
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request Form de eliminar del proyecto
     * @param Int $id Id del proyecto a eliminar
     * @return Redirect Redirigir a listado de proyectos
     * @Route("/{id}", name="proyectos_delete")
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
            $entity = $em->getRepository('sgiiBundle:TblProyecto')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TblProyecto entity.');
            }
            
            $this->get('queries')->deletUsuariosProyecto($id);
            $em->remove($entity);
            $em->flush();
            
            $security->setAuditoria('Eliminar proyecto: '.$id. " - ".$entity->getProNombre());
            $this->get('session')->getFlashBag()->add('alerts', array("type" => "information", "text" => "El proyecto ha sido eliminado correctamente"));
        }
        return $this->redirect($this->generateUrl('proyectos'));
    }
    
    /**
     * Agregar usuarios al proyecto
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @Method("GET")
     * @return Render ViewRender de listado de usuarios que no pertenecen al proyecto
     * @Template("sgiiBundle:TblProyecto:addUsers.html.twig")
     * @Route("/{id}/newUser", name="proyectos_addUsers")
     */
    public function addUsersAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $entity = $this->get('queries')->getProyectos($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TblProyecto entity.');
        }
        
        $entities = $this->get('queries')->getNoUsuariosProyecto($id);
        return array( 'entities' => $entities, 'proyectoId' => $id);
    }
    
    /**
     * CRUD de usuarios de proyecto por POST
     * 
     * Agregar usuarios al proyecto, modificarles el tipo a los usuario, y eliminar esta relación
     * 
     * @author Camilo Quijano <camilo@altactic.com>
     * @version 1
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return Response 0=>Exitoso 1=>Error
     * @Route("/cambioPryUser", name="crud_proyecto_usuario")
     * @Method("POST")
     */
    public function changeEstadoUserProyectoAction(Request $request)
    {
        $security = $this->get('security');
        $authen = $security->autentication();
        $acceso = $security->autorization($this->getRequest()->get('_route'));

        $NoError = 1;
        if($request->isXmlHttpRequest() && ($request->getMethod() == 'POST') && $acceso && $authen)
        {
            $usuarioId = $request->request->get('id');
            $tipo = $request->request->get('tipo');
            $accion = $request->request->get('accion');
            $proyectoId = $request->request->get('proyectoId');
            $em = $this->getDoctrine()->getManager();

            new Response();
            if ($tipo == 'Investigador' || $tipo == 'Asesor') {
                if ($accion == 'add') {
                    $nUserPry = New TblUsuarioProyecto();
                    $nUserPry->setProyectoId($proyectoId);
                    $nUserPry->setUsuarioId($usuarioId);
                    $nUserPry->setUsuarioProyectoTipo($tipo);
                    $em->persist($nUserPry);
                    $em->flush();
                    $NoError = 0;
                }
                if ($accion == 'edit') {
                    $nUserPry = $em->getRepository('sgiiBundle:TblUsuarioProyecto')->findOneBy(Array('proyectoId'=>$proyectoId, 'usuarioId' => $usuarioId));
                    if ($nUserPry) {
                        $nUserPry->setUsuarioProyectoTipo($tipo);
                        $em->persist($nUserPry);
                        $em->flush();
                        $NoError = 0;
                    }
                }
                if ($accion == 'delete') {
                    $nUserPry = $em->getRepository('sgiiBundle:TblUsuarioProyecto')->findOneBy(Array('proyectoId'=>$proyectoId, 'usuarioId' => $usuarioId));
                    if ($nUserPry) {
                        $em->remove($nUserPry);
                        $em->flush();
                        $NoError = 0;
                    }
                }
            }
            
            $btn = '';
            if ($accion == 'add') {
                if ($NoError) {
                    $btn = '<a class="btn btn-danger btn-mini"><i class="icon-user icon-white"></i> Usuario no incluido</a>';
                } else {
                    $btn = '<a class="btn btn-defailt btn-mini"><i class="icon-user icon-black"></i> Usuario incluido</a>';
                }
            }

            if ($accion == 'edit') {
                if ($NoError) {
                    $btn = "<span id='tipoUser_".$usuarioId."' class='label label-danger ctlBasic_".$usuarioId."'>Error en edición</span>";
                } else {
                    $classLabel = ($tipo == 'Investigador') ? 'label-success' : 'label-info';
                    $btn = "<span id='tipoUser_".$usuarioId."' class='label ".$classLabel." ctlBasic_".$usuarioId."'>".$tipo."</span>";
                    
                }
            }
            
            if ($accion == 'delete') {
                $btn = $NoError;
            }
        } else {
            $btn = '<a class="btn btn-danger btn-mini"><i class="icon-user icon-white"></i> Error en solicitud</a>';
        }
        return new response($btn);
    }
    
    
    //--------------------------------------------/
    //--  M E T O D O S  y   F U N C I O N E S  --/
    //--------------------------------------------/

    /**
     * Creación de formulario para eliminar un proyecto
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $id Id del proyecto
     * @return \Symfony\Component\Form\Form Formulario de eliminación
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proyectos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'button', array('label' => 'Eliminar', 'attr' => array('class' => 'btn btn-primary confirm')))
            ->getForm();
    }
    
    /**
     * Funcion para crear el formulario de crear proyecto
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $usuario Objeto TblProyecto
     * @return Object Formulario
     */
    private function proyectoForm($proyecto = null)
    {
        // Estados de proyecto
        $epAct = ($proyecto) ? (($proyecto->getEstadoProyectoId()) ? $proyecto->getEstadoProyectoId() : 1) : 1;
        $empty_value_ep = false;
        $ARRep = $this->get('queries')->getEstadoProyectoArray();
        
        //Tipos de investigación
        $tiAct = ($proyecto) ? (($proyecto->getTipoInvestigacionId()) ? $proyecto->getTipoInvestigacionId() : 1) : 1;
        $empty_value_ti = false;
        $ARRti = $this->get('queries')->getTipoInvestigacionArray();
        
        //Lineas de investigación
        $liAct = ($proyecto) ? (($proyecto->getLineaInvestigacionId()) ? $proyecto->getLineaInvestigacionId() : 1) : 1;
        $empty_value_li = false;
        $ARRli = $this->get('queries')->getLineasInvestigacionArray();
        
        $formData = array(
            'proNombre' => ($proyecto) ? $proyecto->getProNombre() : null,
            'proDescripcion' => ($proyecto) ? $proyecto->getProDescripcion() : null,
            'proProblema' => ($proyecto) ? $proyecto->getProProblema() : null,
            'proConclusiones' => ($proyecto) ? $proyecto->getProConclusiones() : null,
            'proDemostraciones' => ($proyecto) ? $proyecto->getProDemostraciones() : null,
            'proRecomendaciones' => ($proyecto) ? $proyecto->getProRecomendaciones() : null,
            'proEstado' => ($proyecto) ? $proyecto->getProEstado() : null,
            'estadoProyectoId' => null,
            'tipoInvestigacionId' => null,
            'lineaInvestigacionId' => null,
        );
        
        $form = $this->createFormBuilder($formData)
           ->add('proNombre', 'text', array('required' => true, 'attr' => Array('pattern' => '^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑ]*$' )))
           ->add('proDescripcion', 'textarea', array('required' => false))
           ->add('proProblema', 'textarea', array('required' => false))
           ->add('proConclusiones', 'textarea', array('required' => false))
           ->add('proDemostraciones', 'textarea', array('required' => false))
           ->add('proRecomendaciones', 'textarea', array('required' => false))
           ->add('proEstado', 'checkbox', array('required' => false))
           ->add('estadoProyectoId', 'choice', array('choices'  => $ARRep,  'preferred_choices' => array($epAct), 'required' => false, 'empty_value' => $empty_value_ep))
           ->add('tipoInvestigacionId', 'choice', array('choices'  => $ARRti,  'preferred_choices' => array($tiAct), 'required' => false, 'empty_value' => $empty_value_ti))
           ->add('lineaInvestigacionId', 'choice', array('choices'  => $ARRli,  'preferred_choices' => array($liAct), 'required' => false, 'empty_value' => $empty_value_li))
           ->getForm();
        return $form;
    }
    
    /**
	 * Funcion Privada de validación de formulario del proyecto
     * 
     * Validacione aplicadas
     * $proNombre => NotBlank - Regex (Validacion para solo texto y numeros)
     * $estadoProyectoId => NotBlank
     * $tipoInvestigacionId => NotBlank
     * $lineaInvestigacionId => NotBlank
	 * 
	 * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Object Formulario a validar
     * @return Int Cantidad de errores encontrados
	 */
	private function validateFormProyecto($dataForm)
	{
		$proNombre = $dataForm['proNombre'];
        $estadoProyectoId = $dataForm['estadoProyectoId'];
        $tipoInvestigacionId = $dataForm['tipoInvestigacionId'];
        $lineaInvestigacionId = $dataForm['lineaInvestigacionId'];
        
        $NotBlank = new Assert\NotBlank();
		$RegexTEXT = new Assert\Regex(Array('pattern'=>'/^[a-zA-Z0-9 áéíóúÁÉÍÓÚñÑ]*$/'));
        
		$countErrores = 0;
        $countErrores += (count($this->get('validator')->validateValue($proNombre, Array($NotBlank, $RegexTEXT))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($estadoProyectoId, Array($NotBlank))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($tipoInvestigacionId, Array($NotBlank))) == 0) ? 0 : 1;
        $countErrores += (count($this->get('validator')->validateValue($lineaInvestigacionId, Array($NotBlank))) == 0) ? 0 : 1;
		return $countErrores;
	}
}