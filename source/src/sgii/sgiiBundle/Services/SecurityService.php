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
        $secret = 'c260f7806c129e256ed2807f67314c42';
        
        $len = strlen($txt);
        $mlen = round($len/2);
        
        $m1 = substr($txt, 0, $mlen);
        $m2 = substr($txt, $mlen);
        
        $return = sha1(md5($m1.$secret).md5($m2.$secret));
        
        return $return;
    }
    
    /**
     * Funcion para la validacion del nivel de seguridad de contraseñas
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param type $pass
     * @return boolean
     */
    function validarPassword($pass)
    {
        $return = false;
        $nivel = 0;
                
        if(strlen($pass) >= 6)
        {
            $nivel += 1;
            if(preg_match('`[a-z]`',$pass) && preg_match('`[A-Z]`',$pass))
            {
                $nivel += 1;
            }
            if(preg_match('`[0-9]`',$pass) && (preg_match('`[a-z]`',$pass) || preg_match('`[A-Z]`',$pass)))
            {
                $nivel += 1;
            }
            if(preg_match('`[\`,´,~,!,@,#,$,&,%, ,^,(,),+,=,{,},[,\],|,-,_,/,*,$,=,°,¡,?,¿,\,,\.,;,:,\".\',<,>]`',$pass) && (preg_match('`[a-z]`',$pass) || preg_match('`[A-Z]`',$pass)))
            {
                $nivel += 1;
            }
            if(strlen($pass) >= 8)
            {
                $nivel += 1;
            }
            if(strlen($pass) >= 10)
            {
                $nivel += 1;
            }
            
            if($nivel >= 4)
            {
                $return = true;
            }
        }
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
        $return = false;
        $sess_usuario = $this->session->get('sess_usuario');
//        $sess_routes = $this->session->get('sess_routes');
        
        if(isset($sess_usuario['usuLog']))
        {
//            if(count($sess_routes)>0)
//            {
                $return = true;
//            }
        }
        
        return  $return;
    }
    
    /**
     * Funcion que verifica si el usuario tiene permiso a una ruta o modulo
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param string $route ruta de action
     * @param string $check route|mod indica en donde buscar el permiso
     * @return boolean true si tiene el permiso false si no
     */
    public function autorization($route, $check="route")
    {
        $return = false;
        
        if($check == 'route')
        {        
            $sess_routes = $this->session->get('sess_routes');

            if(in_array($route, $sess_routes))
            {
                $return = true;
            }
        }
        elseif($check == 'mod')
        {
            $sess_modulos = $this->session->get('sess_modulos');

            if(in_array($route, $sess_modulos))
            {
                $return = true;
            }
        }
        
        return $return;
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
     * @author Diego Malagón <diego-software@hotmail.com>
     */
    public function logout()
    {
        $this->session->set('sess_usuario',null);
        $this->session->set('sess_modulos',null);
        $this->session->set('sess_routes',null);
    }
    
    /**
     * Funcion para obtener un valor en sesion
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param string $key key del valor en el array de sesion
     */
    public function getSessionValue($key)
    {
        $sess_usuario = $this->session->get('sess_usuario');
        
        $return = false;
        
        if(isset($sess_usuario[$key]))
        {
            $return = $sess_usuario[$key];
        }
        
        return $return;
    }
    
    /**
     * Funcion que obtiene los modulos asociados a los perfiles de un usuario
     * 
     * Obtiene los nombres y las rutas de los modulos
     * 
     * @param integer $usuarioId id de usuario
     * @return array arreglo con los nombres y rutas asociadas
     */
    public function getModulosUsuario($usuarioId)
    {
        /*
        SELECT * FROM tbl_usuario_perfil up
        JOIN tbl_perfil p ON up.perfil_id = p.id
        JOIN tbl_perfil_modulo pm ON p.id = pm.perfil_id
        JOIN tbl_modulo m ON pm.modulo_id = m.id
        WHERE up.usuario_id = 1
        GROUP BY m.id;*/
        $dql = "SELECT m.modNombre, m.modRoute
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
            $routes = explode(',', $r['modRoute']);
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
     * Funcion para registrar una accion de usuario en la auditoria del sistema
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @param integer $usuarioId id de usuario
     * @param string $accion descripcion de la accion ejecutada
     */
    public function setAuditoria($accion)
    {
        $sess_usuario = $this->session->get('sess_usuario');
        $usuarioId = $sess_usuario['id'];
        
        $control = new \sgii\sgiiBundle\Entity\TblAuditoria();
        $control->setAudAccion($accion);
        $control->setAudUsuarioId($usuarioId);
        $control->setAudFecha(new \DateTime());
        $control->setAudIpAcceso($this->getUserIp());
        
        
        $this->em->persist($control);
        $this->em->flush();
    }
    
    /**
     * Funcion para registrar un error del sistema
     * - Acceso desde EventListener\sgiiExceptionListener.php
     * 
     * @param type $error
     * @param type $modulo
     */
    public function setError($error, $modulo = null)
    {
        $sess_usuario = $this->session->get('sess_usuario');
        $usuarioId = (isset($sess_usuario['id'])) ? $sess_usuario['id'] : null;
        
        
        $log = new \sgii\sgiiBundle\Entity\TblLog();
        
        $log->setLogDescripcion($error);
        $log->setLogUsuarioId($usuarioId);
        $log->setLogModulo($modulo);
        $log->setLogFecha(new \DateTime());
        $log->setLogIp($this->getUserIp());
        
        $this->em->persist($log);
        $this->em->flush();
    }
    
    /**
     * Funcion para obtener la ip desde donde es accedida la aplicacion
     * 
     * @author Diego Malagón <diego-software@hotmail.com>
     * @return string
     */
    private function getUserIp() 
    {
        $ip = ""; 
        if(isset($_SERVER)) 
        { 
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
            { 
                $ip=$_SERVER['HTTP_CLIENT_IP'];
            } 
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
            { 
                $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; 
            } 
            else 
            { 
                $ip=$_SERVER['REMOTE_ADDR']; 
            } 
        } 
        else 
        { 
            if ( getenv( 'HTTP_CLIENT_IP' ) ) 
            { 
                $ip = getenv( 'HTTP_CLIENT_IP' ); 
            } 
            elseif ( getenv( 'HTTP_X_FORWARDED_FOR' ) ) 
            { 
                $ip = getenv( 'HTTP_X_FORWARDED_FOR' ); 
            } 
            else 
            { 
                $ip = getenv( 'REMOTE_ADDR' ); 
            } 
        } 
        // En algunos casos muy raros la ip es devuelta repetida dos veces separada por coma 
        if(strstr($ip,',')) 
        { 
            $ip = array_shift(explode(',',$ip)); 
        } 
        
        if($ip == "::1") $ip = "127.0.0.1";
        
        return $ip;
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
