<?php

namespace sgii\sgiiBundle\Services;

/**
 * Servicio para obtener resultados de queries usadas en toda la aplicacion
 * 
 * @author Diego Malagón <diego-software@hotmail.com>
 */
class GenericQueriesService
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
     * Funcion que obtiene las organizaciones
     * 
     * @param integer $id id de organizacion si busca una en especifico
     * @return array
     */
    public function getOrganizaciones($id = null)
    {
        $return = false;
        
        $dql = "SELECT 
                    o.id,
                    o.orgNombre,
                    o.orgDescripcion,
                    o.orgSitioWeb
                FROM 
                    sgiiBundle:TblOrganizacion o
        ";
        
        if($id != null)
        {
            $dql .= "WHERE o.id = :id";
        }
        
        $query = $this->em->createQuery($dql);
        
        if($id != null)
        {
            $query->setParameter('id', $id);
            $query->setMaxResults(1);
        }
        $result = $query->getResult();
        
        if(count($result)>0)
        {
            if($id != null)
            {
                $return = $result[0];
            }
            else
            {
                $return = $result;
            }
        }
        
        return $return;
    }
    
    /**
     * Funcion que obtiene los cargos
     * 
     * @param integer $id id de cargo uno en especifico
     * @return array
     */
    public function getCargos($id = null)
    {
        $return = false;
        
        $dql = "SELECT 
                    c.id,
                    c.carNombre,
                    c.carDescripcion
                FROM 
                    sgiiBundle:TblCargo c
        ";
        
        if($id != null)
        {
            $dql .= "WHERE c.id = :id";
        }
        
        $query = $this->em->createQuery($dql);
        
        if($id != null)
        {
            $query->setParameter('id', $id);
            $query->setMaxResults(1);
        }
        $result = $query->getResult();
        
        if(count($result)>0)
        {
            if($id != null)
            {
                $return = $result[0];
            }
            else
            {
                $return = $result;
            }
        }
        
        return $return;
    }
    
    /**
     * Funcion que obtiene los departamentos/areas
     * 
     * @param integer $id id de departamento si busca uno en especifico
     * @return array
     */
    public function getDepartamentos($id = null)
    {
        $return = false;
        
        $dql = "SELECT 
                    d.id,
                    d.depNombre,
                    d.depDescripcion
                FROM 
                    sgiiBundle:TblDepartamento d
        ";
        
        if($id != null)
        {
            $dql .= "WHERE d.id = :id";
        }
        
        $query = $this->em->createQuery($dql);
        
        if($id != null)
        {
            $query->setParameter('id', $id);
            $query->setMaxResults(1);
        }
        $result = $query->getResult();
        
        if(count($result)>0)
        {
            if($id != null)
            {
                $return = $result[0];
            }
            else
            {
                $return = $result;
            }
        }
        
        return $return;
    }
    
    /**
     * Funcion que verifica si existe un usuario registrado con el email
     * 
     * @param string $email email a verificar
     * @param integer $id id de usuario, se usa en caso de verificar que no exista un usuario con el mismo correo a excepcion del usuario con este id
     */
    public function existsEmail($email, $id = null)
    {
        $dql = "SELECT COUNT(u.id) c FROM sgiiBundle:TblUsuario u WHERE u.usuLog = :email ";
        if($id != null)
        {
            $dql .= " AND u.id != :id";
        }
        $query = $this->em->createQuery($dql);
        $query->setParameter('email', $email);
        if($id != null)
        {
            $query->setParameter('id', $id);
        }
        $query->setMaxResults(1);
        $result = $query->getResult();
        
        if(isset($result[0]['c']) && $result[0]['c'] >= 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Listado de errores registrados en la aplicación
     * - acceso desde TblLogController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return Array Arreglo de errores registrados en la aplicación
     */
    public function getErrores()
    {
        $dql = 'SELECT l.logFecha, l.logIp, l.logDescripcion, l.logModulo,
                    u.usuNombre
                FROM sgiiBundle:TblLog l
                LEFT JOIN sgiiBundle:TblUsuario u WITH u.id = l.logUsuarioId';
        $query = $this->em->createQuery($dql);
        return $query->getResult();
    }
    
    /**
     * Listado de acciones auditables registrados en la aplicación
     * - acceso desde TblAuditoriaController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return Array Arreglo de acciones auditables registrados en la aplicación
     */
    public function getAuditoria()
    {
        $dql = 'SELECT a.audFecha, a.audAccion, a.audIpAcceso,
                    u.usuNombre
                FROM sgiiBundle:TblAuditoria a
                LEFT JOIN sgiiBundle:TblUsuario u WITH u.id = a.audUsuarioId';
        $query = $this->em->createQuery($dql);
        return $query->getResult();
    }
    
    
    /**
     * Funcion que obtiene los usuarios
     * - Acceso desde TblUsuarios
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param integer $id id del usuario si busca uno en específico
     * @return array
     */
    public function getUsuarios($id = null)
    {
        $return = false;
        $dql = "SELECT u.id, u.usuNombre, u.usuCedula, u.usuFechaCreacion, u.usuLog, u.usuEstado,
                    c.carNombre, d.depNombre, o.orgNombre
                FROM sgiiBundle:TblUsuario u
                LEFT JOIN sgiiBundle:TblCargo c WITH c.id = u.cargoId
                LEFT JOIN sgiiBundle:TblDepartamento d WITH d.id = u.departamentoId
                LEFT JOIN sgiiBundle:TblOrganizacion o WITH o.id = u.organizacionId";
        
        if($id != null) {
            $dql .= " WHERE u.id = :id";
        }
        
        $query = $this->em->createQuery($dql);
        if($id != null) {
            $query->setParameter('id', $id);
            $query->setMaxResults(1);
        }
        $result = $query->getResult();
        
        if(count($result)>0) {
            if($id != null) {
                $return = $result[0];
            }
            else {
                $return = $result;
            }
        }
        return $return;
    }
    
    /**
     * Funcion que obtiene las organizaciones retornandolas como array
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array
     */
    public function getOrganizacionesArray()
    {
        $organizaciones = $this->getOrganizaciones();
        $ArrayOrg = Array();
        if ($organizaciones) {
            foreach ($organizaciones as $org){
                $ArrayOrg[$org->getId()] = $org->getDepNombre();
            }
        }
        return $ArrayOrg;
    }
    
    /**
     * Funcion que obtiene los cargos retornandolas como Array
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array
     */
    public function getCargosArray()
    {
        $cargos = $this->getCargos();
        $ArrayCar = Array();
        if ($cargos) {
            foreach ($cargos as $car){
                $ArrayCar[$car->getId()] = $car->getCarNombre();
            }
        }
        return $ArrayCar;
    }
    
    /**
     * Funcion que obtiene los departamentos/areas como Array
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array
     */
    public function getDepartamentosArray()
    {
        $departamentos = $this->getDepartamentos();
        $ArrayDep = Array();
        if ($departamentos) {
            foreach ($departamentos as $dep){
                $ArrayDep[$dep->getId()] = $dep->getCarNombre();
            }
        }
        return $ArrayDep;
    }
}
?>
