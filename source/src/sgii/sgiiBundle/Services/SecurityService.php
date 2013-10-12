<?php

namespace sgii\sgiiBundle\Services;


class SecurityService
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
     * Funcion para la encriptacion de contraseñas
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param string $txt cadena a encriptar
     * @return string cadena encriptada
     */
    function encriptar($txt)
    {
        $return = md5($txt);
        return $return;
    }
    
    /**
     * Funcion que genera una contraseña aleatoria
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return string Contraseña generada sin encriptar
     */
    function generarPassword()
    {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@ñÑ";
        $pass = "";
        for($i=0;$i<10;$i++) 
        {
            $pass .= substr($str,rand(0,62),1);
        }
        return $pass;
    }
    
    /**
     * Funcion que verifica si el usuario esta autenticado
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return boolean
     */
    public function autentication()
    {
        
    }
    
    /**
     * 
     */
    public function autorization()
    {
        
    }
    
    /**
     * Funcion para iniciar sesion a partir de las credenciales de un usuario
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param string $user nombre de usuario
     * @param string $pass contraseña del usuario sin encriptacion
     * @return boolean true inica que se encontro el usuario y se a creado la sesion
     */
    public function login($user, $pass)
    {
        $dql = "SELECT u.id, u.usuCedula, u.usuNombre, u.usuFechaCreacion, u.usuLog, u.usuEstado,
                c.carNombre, d.depNombre, o.orgNombre
                FROM sgiiBundle:TblUsuario u 
                LEFT JOIN sgiiBundle:TblCargo c WITH u.cargoId = c.id
                LEFT JOIN sgiiBundle:TblDepartamento d WITH u.departamentoId = d.id
                LEFT JOIN sgiiBundle:TblOrganizacion o WITH u.organizacionId = o.id
                WHERE u.usuLog = :user AND u.usuPassword = :pass";
        $query = $this->em->createQuery($dql);
        $query->setParameter('user', $user);
        $query->setParameter('pass', $this->encriptar($pass));
        $query->setMaxResults(1);
        $result = $query->getResult();
        
        if(count($result) == 1)
        {
            $usuario = $result[0];

            $modulos = $this->getModulosUsuario($usuario['id']);

            $this->session->set('sess_usuario',$usuario);
            $this->session->set('sess_modulos',$modulos['modulos']);
            $this->session->set('sess_routes',$modulos['routes']);

            return true;
        }
        else
        {
            return false;
        }
    }
    
    /**
     * Funcion para eliminar la session
     * 
     * @author Diego Malagón <diego-software@hotmail.com>     * 
     */
    public function logout()
    {
        $this->session->set('sess_usuario',null);
        $this->session->set('sess_modulos',null);
        $this->session->set('sess_routes',null);
    }
    
    /**
     * Funcion que obtiene los modulos asociados a los perfiles de un usuario
     * 
     * Obtiene los nombres y las rutas de los modulos
     * 
     * @param integer $usuarioId id de usuario
     * @return array arreglo con los nombres y rutas asociadas
     */
    private function getModulosUsuario($usuarioId)
    {
        /*
        SELECT * FROM tbl_usuario_perfil up
        JOIN tbl_perfil p ON up.perfil_id = p.id
        JOIN tbl_perfil_modulo pm ON p.id = pm.perfil_id
        JOIN tbl_modulo m ON pm.modulo_id = m.id
        WHERE up.usuario_id = 1
        GROUP BY m.id;*/
        $dql = "SELECT m.modNombre, m.modRoutes
                FROM sgiiBundle:TblUsuarioPerfil up
                JOIN sgiiBundle:TblPerfil p WITH up.perfilId = p.id
                JOIN sgiiBundle:TblPerfilModulo pm WITH p.id = pm.perfilId
                JOIN sgiiBundle:TblModulo m WITH pm.moduloId = m.id
                WHERE up.usuarioId = :usuarioId
                GROUP BY m.id";
        $query = $this->em->createQuery($dql);
        $query->setParameter('usuarioId', $usuarioId);
        $result = $query->getResult();
        
        $modulos = array('modulos'=>array(), 'routes'=>array());
        foreach($result as $r)
        {
            $modulos['modulos'][] = $r['modNombre'];
            $routes = explode(',', $r['modRoutes']);
            foreach($routes as $route)
            {
                if(!empty($route))
                {
                    if(!in_array($route, $modulos['routes']))
                        $modulos['routes'][] = $route;
                }
            }
        }
            
        
        
        return $modulos;
    }
    
    
    
    /**
     * Funcion para imprimir la estructura de una variable
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param type $var variable a depurar
     */
    public function debug($var)
    {
        if(is_object($var) || is_array($var))
        {
            echo "<pre>";
            print_r($var);
            echo "</pre>";
        }
        else
        {
            var_dump($var);
        }
    }
}

?>
