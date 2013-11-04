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
    
}