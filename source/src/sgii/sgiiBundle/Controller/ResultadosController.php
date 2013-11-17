<?php
namespace sgii\sgiiBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * controlador para los resultados de un instrumento
 * 
 * @Route("/resultados")
 */
class ResultadosController extends Controller
{
    /**
     * Index para los resultados de un instrumento
     * 
     * @Route("/{id}", name="resultados_instrumento")
     * @Template("sgiiBundle:Resultados:index.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param integer $id id del instrumento
     * @return Response
     */
    public function indexAction($id)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        $inst_serv = $this->get('instrumentos');
        
        $resultados = $this->getResultados($id);
        $instrumento = $inst_serv->getInstrumentos($id);
        $usuarios = $inst_serv->getUsuariosInstrumento($id);
//        $security->debug($resultados);
        
        return array (
            'preguntas' => $resultados,
            'instrumento' => $instrumento,
            'usuarios' => $usuarios
        );
    }
    
    /**
     * Index para los resultados de un instrumento
     * 
     * @Route("/{iid}/{uid}", name="resultados_usuario_instrumento")
     * @Template("sgiiBundle:Resultados:resultadosUsuario.html.twig")
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param integer $iid id del instrumento
     * @param integer $uid id del usuario
     * @return Response
     */
    public function resultadosUsuarioAction($iid, $uid)
    {
        $security = $this->get('security');
        if(!$security->autentication()){ return $this->redirect($this->generateUrl('login'));}
//        if(!$security->autorization($this->getRequest()->get('_route'))){ throw $this->createNotFoundException("Acceso denegado");}
        
        $inst_serv = $this->get('instrumentos');
        $queries = $this->get('queries');
        
        $preguntas = $this->getRespuestasUsuario($iid, $uid);
        $instrumento = $inst_serv->getInstrumentos($iid);
        $usuario = $queries->getUsuarios($uid);
        
        return array(
            'preguntas' => $preguntas['preguntas'],
            'puntajeTotal' => $preguntas['puntajeTotal'],
            'puntajeUsuario' => $preguntas['puntajeUsuario'],
            'instrumento' => $instrumento,
            'usuario' => $usuario,
            'iid' => $iid,
            'uid' => $uid
        );
    }
    
    /**
     * Funcion para obtener los resultados de las preguntas del instrumento
     * 
     * Obtiene una sumatoria de la cantidad de veces que se selecciona una opcion de cada pregunta
     * 
     * @param integer $instrumentoId id de instrumento
     * @return array
     */
    private function getResultados($instrumentoId)
    {
        $preguntas = array();
                
        $em = $this->getDoctrine()->getManager();
        
        $dql = "SELECT
                    p.id,
                    p.prePregunta,
                    p.preObligatoria,
                    tp.id tipoId,
                    tp.tprTipoPregunta
                FROM
                    sgiiBundle:TblPregunta p
                    JOIN sgiiBundle:TblTipoPregunta tp WITH p.tipoPregunta = tp.id
                WHERE 
                    p.herramienta = :instrumentoId
                    AND p.preEstado = 1
                ORDER BY p.preOrden
                    ";
        $query = $em->createQuery($dql);
        $query->setParameter("instrumentoId", $instrumentoId);
        $result_preguntas = $query->getResult();
                
        
        // Crear array con ids por keys y array de ids para consultar preguntas
        if(count($result_preguntas)>0)
        {
            $ids = array();
            foreach($result_preguntas as $p)
            {
                $preguntas[$p['id']] = $p;                
                $ids[] = $p['id'];
            }
            
            
            $dql = "SELECT
                        r.pregunta,
                        r.resRespuesta,
                        COUNT(ru.id) c
                    FROM 
                        sgiiBundle:TblRespuesta r
                        LEFT JOIN sgiiBundle:TblRespuestaUsuario ru WITH r.id = ru.respuesta
                    WHERE
                        (r.pregunta = ".  implode(" OR r.pregunta = ", $ids).")
                    GROUP BY r.id
                    ";
            $query = $em->createQuery($dql);
            $result_respuestas = $query->getResult();
            
            foreach($result_respuestas as $r)
            {
                $preguntas[$r['pregunta']]['opciones'][] = $r;
            }
        }
        
        return $preguntas;
    }
        
    /**
     * Funcion para obtener las preguntas y resultados de usuario
     * 
     * @param integer $instrumentoId id de instrumento
     * @return array arreglo de preguntas
     */
    private function getRespuestasUsuario($instrumentoId, $usuarioId)
    {
        $preguntas = array();
        $puntajeTotal = 0;
        $puntajeUsuario = 0;
        
        $em = $this->getDoctrine()->getManager();
        
        $dql = "SELECT
                    p.id,
                    p.prePregunta,
                    p.preObligatoria,
                    tp.id tipoId,
                    tp.tprTipoPregunta
                FROM
                    sgiiBundle:TblPregunta p
                    JOIN sgiiBundle:TblTipoPregunta tp WITH p.tipoPregunta = tp.id
                WHERE 
                    p.herramienta = :instrumentoId
                    AND p.preEstado = 1
                ORDER BY p.preOrden
                    ";
        $query = $em->createQuery($dql);
        $query->setParameter("instrumentoId", $instrumentoId);
        $result_preguntas = $query->getResult();
        
        
        
        // Crear array con ids por keys y array de ids para consultar preguntas
        if(count($result_preguntas)>0)
        {
            $ids = array();
            foreach($result_preguntas as $p)
            {
                $preguntas[$p['id']] = $p;
                $preguntas[$p['id']]['puntajeTotal'] = 0;
                $preguntas[$p['id']]['puntajeUsuario'] = 0;
                $ids[] = $p['id'];
            }
            
            // Consultar las opciones de respuesta de las preguntas
            $dql = "SELECT
                        r.id,
                        r.resRespuesta,
                        r.resPeso,
                        r.pregunta
                    FROM
                        sgiiBundle:TblRespuesta r
                    WHERE 
                        (r.pregunta = ".implode(" OR r.pregunta = ", $ids).") ";
            $query = $em->createQuery($dql);
            $result_opciones = $query->getResult();
            
            
            // Agregar resultado de respuestas a cada pregunta
            foreach($result_opciones as $o)
            {
                $preguntas[$o['pregunta']]['opciones'][] = $o;                 
                $preguntas[$o['pregunta']]['puntajeTotal'] += $o['resPeso'];
                $puntajeTotal +=  $o['resPeso'];
            } 
            
            
            // Consultar las respuestas de los usuarios 
            $dql = "SELECT
                        ru.pregunta,
                        ru.id,
                        ru.rusRespuestaTextual,
                        r.id,
                        r.resRespuesta,
                        r.resPeso
                    FROM
                        sgiiBundle:TblRespuestaUsuario ru
                        LEFT JOIN  sgiiBundle:TblRespuesta r WITH ru.respuesta = r.id
                    WHERE 
                        (ru.pregunta = ".implode(" OR ru.pregunta = ", $ids).")
                        AND ru.usuario = :usuarioId ";
            $query = $em->createQuery($dql);
            $query->setParameter('usuarioId', $usuarioId);
            $result_respuestas = $query->getResult();
            
//            $this->get('security')->debug($result_respuestas);
            foreach($result_respuestas as $ru)
            {
                $preguntas[$ru['pregunta']]['respuestas'][] = $ru;
                $preguntas[$ru['pregunta']]['puntajeUsuario'] += $ru['resPeso'];
                $puntajeUsuario += $ru['resPeso'];
            } 
        }
        
        return array(
            'preguntas' => $preguntas,
            'puntajeTotal' => $puntajeTotal,
            'puntajeUsuario' => $puntajeUsuario
        );
    }
}
?>