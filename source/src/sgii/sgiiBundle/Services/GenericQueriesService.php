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
     * Funcion que verifica si un usuario existe por medio del correo electronico y/o cedula
     * - Acceso desde TblUsuarioController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param String $email Correo a validar si existe
     * @param Int $documento Número de cédula a validar si existe
     * @param Int $id Id del usuario
     * @return Boolean
     */
    public function existUser($email, $documento, $id = null)
    {
        $return = true;
        $dql = "SELECT u.id FROM sgiiBundle:TblUsuario u WHERE (u.usuLog =:email OR u.usuCedula =:documento)";
        if($id != null)
        {
            $dql .= " AND u.id != :id";
        }
        $query = $this->em->createQuery($dql);
        $query->setParameter('email', $email);
        $query->setParameter('documento', $documento);
        if($id != null)
        {
            $query->setParameter('id', $id);
        }
        $query->setMaxResults(1);
        $result = $query->getResult();
        if (COUNT($result)>0) {
            $return = false;
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
     * Listado de Perfiles Activos
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return Array Arreglo de perfiles activos
     */
    public function getPerfiles()
    {
        $dql = "SELECT p.id, p.perPerfil, p.perEstado
            FROM sgiiBundle:TblPerfil p
            WHERE p.perEstado = 1";
        $query = $this->em->createQuery($dql);
        return $query->getResult();
    }
    
    /**
     * Perfil del usuario que ingresa por Id
     * - Acceso desde TblUsuarioController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $usuarioId Id del usuario
     * @param String $valor Valor que retorna del perfil, por default, el ID.
     * @return Array Arreglo de perfiles del usuario
     */
    public function getPerfilUsuario($usuarioId, $valor = 'id')
    {
        $dql = "SELECT up.perfilId, p.perPerfil
            FROM sgiiBundle:TblUsuarioPerfil up
            JOIN sgiiBundle:TblPerfil p WITH p.id = up.perfilId
            WHERE up.usuarioId =:usuario";
        $query = $this->em->createQuery($dql);
        $query->setParameter('usuario', $usuarioId);
        $perfilUser = $query->getResult();
        
        $perfil = false;
        if ($valor == 'id') {
            $perfil = ($perfilUser) ? $perfilUser[0]['perfilId'] : 0;
        }
        elseif ($valor == 'nombre') {
            $perfil = ($perfilUser) ? $perfilUser[0]['perPerfil'] : 0;
        }
        return $perfil;
    }
    
    /**
     * Borrar perfiles del usuario
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $usuarioId Id del usuario
     */
    public function deletPerfilesUsuario($usuarioId)
    {
        $dql = "DELETE FROM sgiiBundle:TblUsuarioPerfil up
            WHERE up.usuarioId =:usuario";
        $query = $this->em->createQuery($dql);
        $query->setParameter('usuario', $usuarioId);
        $query->getResult();
    }
    
    /**
     * Borrar Usuarios del proyecto
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param Int $proyectoId Id del proyecto
     */
    public function deletUsuariosProyecto($proyectoId)
    {
        $dql = "DELETE FROM sgiiBundle:TblUsuarioProyecto up
            WHERE up.proyectoId =:proyectoId";
        $query = $this->em->createQuery($dql);
        $query->setParameter('proyectoId', $proyectoId);
        $query->getResult();
    }
    
    /**
     * Funcion que obtiene los perfiles retornandolas como array
     * - acceso desde TblUsuarioController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array
     */
    public function getPerfilesArray()
    {
        $perfiles = $this->getPerfiles();
        $ArrayPer = Array();
        if ($perfiles) {
            foreach ($perfiles as $per){
                $ArrayPer[$per['id']] = $per['perPerfil'];
            }
        }
        return $ArrayPer;
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
        $dql = "SELECT u.id, u.usuNombre, u.usuApellido, u.usuCedula, u.usuFechaCreacion, u.usuLog, u.usuEstado,
                    c.carNombre, d.depNombre, o.orgNombre, n.nivNombre
                FROM sgiiBundle:TblUsuario u
                LEFT JOIN sgiiBundle:TblCargo c WITH c.id = u.cargoId
                LEFT JOIN sgiiBundle:TblDepartamento d WITH d.id = u.departamentoId
                LEFT JOIN sgiiBundle:TblOrganizacion o WITH o.id = u.organizacionId
                LEFT JOIN sgiiBundle:TblNivel n WITH n.id = u.nivelId";
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
     * - acceso desde TblUsuarioController
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
                $ArrayOrg[$org['id']] = $org['orgNombre'];
            }
        }
        return $ArrayOrg;
    }
    
    /**
     * Funcion que obtiene los cargos retornandolas como Array
     * - acceso desde TblUsuarioController
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
                $ArrayCar[$car['id']] = $car['carNombre'];
            }
        }
        return $ArrayCar;
    }
    
    /**
     * Funcion que obtiene los departamentos/areas como Array
     * - acceso desde TblUsuarioController
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
                $ArrayDep[$dep['id']] = $dep['depNombre'];
            }
        }
        return $ArrayDep;
    }
    
    /**
     * Funcion que obtiene los Niveles como Array
     * - acceso desde TblUsuarioController
     * - acceso desde PerfilController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array
     */
    public function getNivelesArray()
    {
        $dql = "SELECT n.id, n.nivNombre
            FROM sgiiBundle:TblNivel n";
        $query = $this->em->createQuery($dql);
        $niveles = $query->getResult();
        
        $ArrayNiv = Array();
        if ($niveles) {
            foreach ($niveles as $niv){
                $ArrayNiv[$niv['id']] = $niv['nivNombre'];
            }
        }
        return $ArrayNiv;
    }
    
    /**
     * Funcion que obtiene los Estados de proyecto
     * - acceso desde TblProyectosController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array En donde la clave es el Id del estado
     */
    public function getEstadoProyectoArray()
    {
        $dql = "SELECT ep.id, ep.eprEstadoProyecto
            FROM sgiiBundle:TblEstadoProyecto ep
            WHERE ep.eprEstado = 1";
        $query = $this->em->createQuery($dql);
        $estadoProyecto = $query->getResult();
        
        $ArrayEp = Array();
        if ($estadoProyecto) {
            foreach ($estadoProyecto as $ep){
                $ArrayEp[$ep['id']] = $ep['eprEstadoProyecto'];
            }
        }
        return $ArrayEp;
    }
    
    /**
     * Funcion que obtiene los Tipos de investigación
     * - acceso desde TblProyectosController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array En donde la clave es el Id del tipo de investigación
     */
    public function getTipoInvestigacionArray()
    {
        $dql = "SELECT ti.id, ti.tinNombreTipo
            FROM sgiiBundle:TblTipoInvestigacion ti
            WHERE ti.tinEstado = 1";
        $query = $this->em->createQuery($dql);
        $tipoInvestigacion = $query->getResult();
        
        $ArrayTi = Array();
        if ($tipoInvestigacion) {
            foreach ($tipoInvestigacion as $ti){
                $ArrayTi[$ti['id']] = $ti['tinNombreTipo'];
            }
        }
        return $ArrayTi;
    }
    
    /**
     * Funcion que obtiene las lineas de investigación
     * - acceso desde TblProyectosController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @return array En donde la clave es el Id de las lineas de investigación
     */
    public function getLineasInvestigacionArray()
    {
        $dql = "SELECT li.id, li.linNombreInvestigacion
            FROM sgiiBundle:TblLineaInvestigacion li
            WHERE li.linEstado = 1";
        $query = $this->em->createQuery($dql);
        $lineaInvestigacion = $query->getResult();
        
        $ArrayLi = Array();
        if ($lineaInvestigacion) {
            foreach ($lineaInvestigacion as $li){
                $ArrayLi[$li['id']] = $li['linNombreInvestigacion'];
            }
        }
        return $ArrayLi;
    }
    
    /**
     * Funcion que obtiene los proyectos
     * - Acceso desde TblProyectosController
     * 
     * @author Camilo Quijano <camiloquijano31@hotmail.com>
     * @version 1
     * @param integer $id id del proyecto si busca uno en específico
     * @return array
     */
    public function getProyectos($id = null)
    {
        $return = false;
        $dql = "SELECT p.id, p.proNombre, p.proDescripcion, p.proProblema, p.proFechaCreacion, p.proConclusiones, 
                    p.proDemostraciones, p.proRecomendaciones, p.proEstado, 
                    p.usuarioId, u.usuNombre, u.usuApellido,
                    p.lineaInvestigacionId, ti.tinNombreTipo,
                    p.estadoProyectoId, ep.eprEstadoProyecto,
                    p.tipoInvestigacionId, li.linNombreInvestigacion
                FROM sgiiBundle:TblProyecto p
                LEFT JOIN sgiiBundle:TblEstadoProyecto ep WITH ep.id = p.estadoProyectoId
                LEFT JOIN sgiiBundle:TblLineaInvestigacion li WITH li.id = p.lineaInvestigacionId
                LEFT JOIN sgiiBundle:TblTipoInvestigacion ti WITH ti.id = p.tipoInvestigacionId
                LEFT JOIN sgiiBundle:TblUsuario u WITH u.id = p.usuarioId
                ";
        if($id != null) {
            $dql .= " WHERE p.id = :id";
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
}
?>
