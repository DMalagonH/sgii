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
     * @return array
     */
    public function getInstrumentos($proyectoId = false)
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
            $dql .= " WHERE p.id = :proyectoId ";
        
        $query = $this->em->createQuery($dql);
        
        if($proyectoId)
            $query->setParameter('proyectoId', $proyectoId);
        
        $query = $this->em->createQuery($dql);
        $result = $query->getResult();        
        return $result;        
    }
    
    
    /**
     * Funcion para eliminar en cascada un instrumento
     * 
     * Permite eliminar un instrumento siempre y cuando no contenga respuestas asociadas
     * 
     * @param integer $instrumentoId id de instrumento
     */
    public function deleteInstrumento($instrumentoId)
    {
        // Buscar preguntas del instrumento
        $dql = "SELECT p.id FROM sgiiBundle:TblPregunta p
                WHERE p.herramientaId = :instrumentoId";
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
            
            $dql = "DELETE FROM sgiiBundle:TblRespuesta r WHERE r.pregunta = ".$where." ";
            $query = $this->em->createQuery($dql);
            $query->getResult(); 
            
        }
        
        // Eliminar preguntas del instrumento
        $dql = "DELETE FROM sgiiBundle:TblPregunta p WHERE p.herramientaId = :instrumentoId ";
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
}