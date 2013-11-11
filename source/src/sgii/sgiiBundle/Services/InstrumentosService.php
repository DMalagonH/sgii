<?php

namespace sgii\sgiiBundle\Services;

class InstrumentosService
{
    protected $doctrine;
    protected $session;
    protected $em;
        
    function __construct($doctrine, $session) 
    {
        $this->doctrine = $doctrine;
        $this->session = $session;
        $this->em = $doctrine->getManager();
    }
        
    /**
     * Funcion para obtener los proyectos
     * 
     * Obtiene unicamente los proyectos activos
     * 
     * @return array arreglo de proyectos
     */
    public function getProyectos()
    {
        $dql = "SELECT 
                    p.id,
                    p.proNombre
                FROM 
                    sgiiBundle:TblProyecto p
                WHERE  p.proEstado = 1";
        
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();        
        return $result;
    }    
    
    /**
     * Funcion para obtener los tipos de instrumentos
     * 
     * Obtiene unicamente los tipos de instrumento activos
     * 
     * @return array
     */
    public function getTiposInstrumento()
    {
        $dql = "SELECT 
                    ti.id,
                    ti.theNombreHerramienta
                FROM 
                    sgiiBundle:TblTipoHerramienta ti
                WHERE  ti.theEstado = 1";
        
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();        
        return $result;
    }
        
    /**
     * Funcion para obtener los instrumentos registrados
     * 
     * @param integer $proyectoId id de proyecto
     * @param integer $instrumentoId id de instrumento
     * @return array
     */
    public function getInstrumentos($instrumentoId = false, $proyectoId = false)
    {
        $dql = "SELECT 
                    i.id,
                    i.herNombreHerramienta,
                    i.herFechaInicio,
                    i.herFechaFin,
                    i.herEstado,
                    ti.theNombreHerramienta,
                    p.proNombre
                FROM 
                    sgiiBundle:TblHerramienta i
                    JOIN sgiiBundle:TblTipoHerramienta ti WITH i.tipoHerramienta = ti.id
                    LEFT JOIN sgiiBundle:TblProyecto p WITH i.proyecto = p.id";
        if($proyectoId)
        {
            $dql .= " WHERE p.id = :proyectoId ";
        }
        elseif($instrumentoId)
        {
            $dql .= " WHERE i.id = :instrumentoId ";
        }
        
        $query = $this->em->createQuery($dql);
        
        if($proyectoId)
        {
            $query->setParameter('proyectoId', $proyectoId);
        }
        elseif($instrumentoId)
        {
            $query->setParameter('instrumentoId', $instrumentoId);
            $query->setMaxResults(1);
        }
        
        $result = $query->getResult(); 
        
        if($instrumentoId)
        {
            $result = $result[0];
        }
        
        return $result;        
    }
        
    /**
     * Funcion para eliminar en cascada un instrumento
     * 
     * Permite eliminar un instrumento siempre y cuando no contenga respuestas asociadas
     * 
     * @param integer $instrumentoId id de instrumento
     * @return boolean true si se elimino el instrumento falso en caso contrario
     */
    public function deleteInstrumento($instrumentoId)
    {
        // Buscar preguntas del instrumento
        $dql = "SELECT p.id FROM sgiiBundle:TblPregunta p
                WHERE p.herramienta = :instrumentoId";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);
        $result = $query->getResult(); 
        
        if(count($result))
        {
        
            // Crear array con id de preguta como valor
            $preguntas = array();
            foreach($result as $r)
            {
                $preguntas[] = $r['id'];
            }

            /*
             * Buscar respuestas de usuarios a las preguntas encontradas
             * Si se encuentran registros no se inicia la eliminacion
             */
            $where = implode(' OR ru.pregunta = ', $preguntas);
            $dql = "SELECT COUNT(ru.id) c FROM sgiiBundle:TblRespuestaUsuario ru
                    WHERE ru.pregunta = ".$where." ";
            $query = $this->em->createQuery($dql);
            $result = $query->getResult(); 

            
            if($result[0]['c'] > 0)
            {
                // Cancela la eliminacion
                return false;
            }
            
            
            // Eliminar opciones de repuesta de las preguntas encontradas
            $where = implode(' OR r.pregunta = ', $preguntas);
            $dql = "DELETE FROM sgiiBundle:TblRespuesta r WHERE r.pregunta = ".$where." ";
            $query = $this->em->createQuery($dql);
            $query->getResult(); 
            
        }
        
        // Eliminar preguntas del instrumento
        $dql = "DELETE FROM sgiiBundle:TblPregunta p WHERE p.herramienta = :instrumentoId ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);
        $query->getResult(); 
        
        // Eliminar usuarios asociados al instrumento
        $dql = "DELETE FROM sgiiBundle:TblUsuarioHerramienta ui WHERE ui.herramientaId = :instrumentoId ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);
        $query->getResult(); 
        
        // Eliminar instrumento
        $dql = "DELETE FROM sgiiBundle:TblHerramienta i WHERE i.id = :instrumentoId ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);
        $query->getResult(); 
        
        return true;
    }
    
    /**
     * Funcion para obtener los tipos de pregunta
     * 
     * @return array
     */
    public function getTiposPreguta()
    {
        $dql = "SELECT 
                    tp.id,
                    tp.tprTipoPregunta
                FROM 
                    sgiiBundle:TblTipoPregunta tp
                WHERE  tp.tprEstado = 1";
        
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();        
        return $result;
    }
    
    /**
     * Funcion para obtener las preguntas de un instrumento
     * 
     * @param integer $id id de instrumento
     * @return arrray arreglo de preguntas
     */
    public function getPreguntasInstrumento($id)
    {
        $dql = "SELECT
                    p.id,
                    p.prePregunta,
                    p.preOrden,
                    tp.tprTipoPregunta
                FROM
                    sgiiBundle:TblPregunta p
                    JOIN sgiiBundle:TblTipoPregunta tp WITH p.tipoPregunta = tp.id
                WHERE 
                    p.herramienta = :instrumentoId
                ORDER BY p.preOrden ASC
                ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $id);
        $result = $query->getResult();
        
        // crear array con id de pregunta como keys
        $preguntas = array();
        foreach($result as $p)
        {
            $preguntas[$p['id']] = $p;
        }
        
        $dql = "SELECT 
                    r.id,
                    r.resRespuesta,
                    r.resPeso,
                    p.id preguntaId
                FROM
                    sgiiBundle:TblRespuesta r
                    JOIN sgiiBundle:TblPregunta p WITH r.pregunta = p.id
               WHERE
                    p.herramienta = :instrumentoId";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $id);
        $opc_respuesta = $query->getResult();
        
        // Agregar opciones de respuesta al array de preguntas
        foreach($opc_respuesta as $op)
        {
            $preguntas[$op['preguntaId']]['opciones'][] = $op;
        }
        
        return $preguntas;        
    }
    
    /**
     * Funcion para obtener las opciones de respuesta de una pregunta
     * 
     * @param integer $id id de pregunta
     * @return array arreglo de opciones
     */
    public function getOpcionesPregunta($id)
    {
        $dql = "SELECT 
                    r.id,
                    r.resRespuesta,
                    r.resPeso
                FROM
                    sgiiBundle:TblRespuesta r
               WHERE
                    r.pregunta = :preguntaId";
        $query = $this->em->createQuery($dql);
        $query->setParameter('preguntaId', $id);
        $opc_respuesta = $query->getResult();
        
        return $opc_respuesta;        
    }
        
    /**
     * Funcion que cuenta la cantidad de respuestas de usuarios en una pregunta
     * 
     * @param integer $id id de pregunta
     * @return integer numero de respuestas
     */
    public function countRespuestasUsuarios($id)
    {
        $count = 0;
        
        $dql = "SELECT COUNT(ru.id) c FROM sgiiBundle:TblRespuestaUsuario ru
                WHERE ru.pregunta = :preguntaId ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('preguntaId', $id);
        $result = $query->getResult();
                
        if(isset($result[0]['c']))
        {
            $count = $result[0]['c'];
        }
        
        return $count;
    }
    
    /**
     * Funcion para eliminar una pregunta
     * 
     * @param integer $id id de pregunta
     * @return boolean true si se elimino la pregunta falso en caso contrario
     */
    public function deletePregunta($id)
    {
        if($this->countRespuestasUsuarios($id) == 0)
        {            
            // Eliminar opciones de respuesta
            $dql = "DELETE FROM sgiiBundle:TblRespuesta r WHERE r.pregunta = :preguntaId ";
            $query = $this->em->createQuery($dql);
            $query->setParameter('preguntaId', $id);
            $query->getResult(); 
            
            // Eliminar pregunta
            $dql = "DELETE FROM sgiiBundle:TblPregunta p WHERE p.id = :preguntaId ";
            $query = $this->em->createQuery($dql);
            $query->setParameter('preguntaId', $id);
            $query->getResult();  
            
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Funcion para obtener los usuarios invitados a aplicar en un instrumento
     * 
     * @param integer $instrumentoId id de instrumento
     */
    public function getUsuariosInstrumento($instrumentoId)
    {
        $dql = "SELECT
                    uh.id,
                    u.id usuarioId,
                    u.usuNombre,
                    u.usuApellido,
                    u.usuLog,
                    uh.ushFechaActivoInicio,
                    uh.ushFechaActivoFin,
                    uh.ushFechaAplico,
                    uh.ushAplico
                FROM 
                    sgiiBundle:TblUsuarioHerramienta uh
                    JOIN sgiiBundle:TblUsuario u WITH u.id = uh.usuario
                WHERE 
                    uh.herramienta = :instrumentoId
                ORDER BY u.usuApellido, u.usuNombre
                ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);  
        
        $result = $query->getResult();
        
        return $result;
    }
    
    /**
     * Funcion para buscar usuarios
     * 
     * @param array $data arreglo con criterios de busqueda
     * @param string $operador
     * @return array arreglo de usuarios
     */
    public function buscarUsuario($data, $instrumentoId, $operador = 'OR')
    {
        // Preparacion de la consulta
        $dql = "SELECT
                    u.id,
                    u.usuCedula,
                    u.usuNombre,
                    u.usuApellido,
                    u.usuLog,
                    c.carNombre,
                    n.nivNombre,
                    d.depNombre,
                    o.orgNombre
                FROM
                    sgiiBundle:TblUsuario u
                    LEFT JOIN sgiiBundle:TblCargo c WITH u.cargoId = c.id
                    LEFT JOIN sgiiBundle:TblNivel n WITH u.nivelId = n.id
                    LEFT JOIN sgiiBundle:TblDepartamento d WITH u.departamentoId = d.id
                    LEFT JOIN sgiiBundle:TblOrganizacion o WITH u.organizacionId = o.id
                    LEFT JOIN sgiiBundle:TblUsuarioHerramienta uh WITH u.id = uh.usuario AND uh.herramienta = :instrumentoId
                WHERE
                    uh.herramienta IS NULL";
                    
        $where = array();
        
        if(!empty($data['nombre']))
        {
            $where[] = " u.usuNombre LIKE :usuNombre ";
        }
        if(!empty($data['apellido']))
        {
            $where[] = " u.usuApellido LIKE :usuApellido ";
        }
        if(!empty($data['email']))
        {
            $where[] = " u.usuLog = :usuLog ";
        }
        if(!empty($data['cargo']))
        {
            $where[] = " u.cargoId = :cargoId ";
        }
        if(!empty($data['nivel']))
        {
            $where[] = " u.nivelId = :nivelId ";
        }
        if(!empty($data['departamento']))
        {
            $where[] = " u.departamentoId = :departamentoId ";
        }
        if(!empty($data['organizacion']))
        {
            $where[] = " u.organizacionId = :organizacionId ";
        }
        
        if(count($where)>0)
        {
            $dql .= " AND ".implode($operador, $where);
        }
        
        $dql .= " GROUP BY u.id
                  ORDER BY u.usuApellido, u.usuNombre ";
        $query = $this->em->createQuery($dql);
        $query->setParameter('instrumentoId', $instrumentoId);
        
        // paso de parametros a la consulta
        if(!empty($data['nombre']))
        {
            $query->setParameter('usuNombre', '%'.$data['nombre'].'%');
        }
        if(!empty($data['apellido']))
        {
            $query->setParameter('usuApellido', '%'.$data['apellido'].'%');
        }
        if(!empty($data['email']))
        {
            $query->setParameter('usuLog', $data['email']);
        }
        if(!empty($data['cargo']))
        {
            $query->setParameter('cargoId', $data['cargo']);
        }
        if(!empty($data['nivel']))
        {
            $query->setParameter('nivelId', $data['nivel']);
        }
        if(!empty($data['departamento']))
        {
            $query->setParameter('departamentoId', $data['departamento']);
        }
        if(!empty($data['organizacion']))
        {
            $query->setParameter('organizacionId', $data['organizacion']);
        }
        
        //Ejecucion de la consulta
        $result = $query->getResult();
        
        return $result;
    }
}