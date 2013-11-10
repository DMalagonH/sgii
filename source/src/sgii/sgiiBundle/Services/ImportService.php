<?php

namespace sgii\sgiiBundle\Services;

use PHPExcel;
use PHPExcel_Reader_Excel2007;

class ImportService
{
    protected $serv_cont;
    protected $doctrine;
    protected $session;
    protected $em;
        
    function __construct($service_container) 
    {
        $this->serv_cont = $service_container;
        $this->doctrine = $service_container->get('doctrine');
        $this->session = $service_container->get('session');
        $this->em = $this->doctrine->getManager();
    }
    
    /** 
     * Funcion para importar usuarios desde un archivo excel
     * 
     * @param Object $file objeto UploadedFile del formulario
     * @param integer $max numero de filas a leer del excel
     * @return array arreglo con numero de registros importados y no importados y arreglo de mensajes
     */
    public function importUsuarios($file, $max = 100)
    {
        set_time_limit(0); //quitar el limite de tiempo de ejecucion
        
        $name = $file->getClientOriginalName();
        $exp_name = explode(".", $name);                    
        $ext = $exp_name[count($exp_name) - 1]; 
        
        $name = uniqid('iu', true).'.'.$ext;
        
        $dir = 'tmp/';
        
        $file->move($dir, $name);
        
        $path = $dir.$name;
                
        $excelReader = new PHPExcel_Reader_Excel2007();
        $objExcel = $excelReader->load($path);
        $objExcel->setActiveSheetIndex(0);
        
        
        $data = array();
        for($i = 1; $i <= $max; $i++)
        {
            $data[$i]['usuCedula'] = $objExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
            $data[$i]['usuNombre'] = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
            $data[$i]['usuApellido'] = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
            $data[$i]['usuLog'] = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
            $data[$i]['cargo'] = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
            $data[$i]['nivel'] = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
            $data[$i]['departamento'] = $objExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
            $data[$i]['organizacion'] = $objExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
        }
        
		// Eliminar archivo temporal
		unlink($path);
		        
        $importados = 0;
        $no_importados = 0;
        $msg = array();
        
        // Validar e insertar usuarios
        foreach($data as $k => $u)
        {
            // Validar campos obligatorios
            if(!empty($u['usuNombre']) && !empty($u['usuApellido']) && !empty($u['usuLog']))
            {
                // Validar formato de los campos
                $validate = $this->serv_cont->get('validate');
                
                $data_val = array();
                
                $data_val['usuCedula'] = $validate->validateNumOnly(trim($u['usuCedula']), false);
                $data_val['usuNombre'] = $validate->validateTextOnly(trim($u['usuNombre']), true);
                $data_val['usuApellido'] = $validate->validateTextOnly(trim($u['usuApellido']), true);
                $data_val['usuLog'] = $validate->validateEmail(trim($u['usuLog']), true);
                $data_val['cargo'] = $validate->validateAlfaNum(trim($u['cargo']), false);
                $data_val['nivel'] = $validate->validateAlfaNum(trim($u['nivel']), false);
                $data_val['departamento'] = $validate->validateAlfaNum(trim($u['departamento']), false);
                $data_val['organizacion'] = $validate->validateAlfaNum(trim($u['organizacion']), false);
                
                $errors = 0;
                foreach($data_val as $v)
                {
                    if(!$v)
                    {
                        $errors ++;
                    }
                }
                
                if($errors == 0)
                {
                    // Validar que el usuario no exista
                    $usuario = $this->em->getRepository("sgiiBundle:TblUsuario")->findOneByUsuLog($u['usuLog']);
                    
                    if(!$usuario)
                    {
                        // Registrar usuario
                        $importados ++;

                        // Relaciones con otras tablas
                        $cargo = false;
                        $nivel = false;
                        $departamento = false;
                        $organizacion = false;

                        if(!empty($u['cargo'])) $cargo = $this->verificarRegistroRelacionado("TblCargo", "carNombre", $u['cargo']);
    //                    if(!empty($u['nivel'])) $nivel = $this->verificarRegistroRelacionado("TblNivel", "nivNombre", $u['nivel']);
                        if(!empty($u['departamento'])) $departamento = $this->verificarRegistroRelacionado("TblDepartamento", "depNombre", $u['departamento']);
                        if(!empty($u['organizacion'])) $organizacion = $this->verificarRegistroRelacionado("TblOrganizacion", "orgNombre", $u['organizacion']);

                        // Asignar valores a la entidad usuario
                        $usuario =  new \sgii\sgiiBundle\Entity\TblUsuario();
                        $usuario->setUsuCedula($u['usuCedula']);
                        $usuario->setUsuNombre($u['usuNombre']." ".$u['usuApellido']);
    //                    $usuario->setUsuNombre($u['usuNombre']);
    //                    $usuario->setUsuApellido($u['usuApellido']);
                        $usuario->setUsuLog($u['usuLog']);
                        if($cargo) $usuario->setCargoId($cargo->getId());
    //                    if($nivel) $usuario->setNivelId($nivel->getId());
                        if($departamento) $usuario->setDepartamentoId($departamento->getId());
                        if($organizacion) $usuario->setOrganizacionId($organizacion->getId());

                        //Generar contraseña 
                        $security = $this->serv_cont->get('security');
                        $pass = $security->generarPassword();

                        $usuario->setUsuPassword($security->encriptar($pass));
                        
                        // Persistir registro
                        $this->em->persist($usuario);
                        $this->em->flush();
                        
                        
                        //Enviar correo de notificacion
                        
                        
                        $msg[] = "La fila ".$k." se importó correctamente";
                    }
                    else
                    {
                        $no_importados ++;
                        $msg[] = "La fila ".$k." ya existe";
                    }
                }
                else
                {
                    $no_importados ++;
                    $msg[] = "La fila ".$k." contiene campos inválidos";
                }                
            }
            else
            {
                $no_importados ++;
                $msg[] = "La fila ".$k." no contiene los campos obligatorios";
            }
        }
        
        return array(
            'importados' => $importados,
            'no_importados' => $no_importados,
            'msg' => $msg
        );
    }
    
    
    /**
     * Funcion que verifica si existe un registro en una tabla
     * 
     * Realiza la busqueda en la tabla por el campo y valor indicados
     * en caso de no encontra un registro lo crea
     * 
     * @param string $tabla Nombre de la entidad de la tabla
     * @param string $campo Nombre del campo en la entidad
     * @param string $valor Valor del campo
     * @return Object objeto entidad encontrada o insertada
     */
    public function verificarRegistroRelacionado($tabla, $campo, $valor)
    {
        $valor = trim(strtolower($valor));
        
        $entity = $this->em->getRepository("sgiiBundle:".$tabla)->findOneBy(array($campo => $valor));
        
        
        if(!$entity)
        {
            switch($tabla)
            {
                case 'TblCargo':
                {
                    $entity = new \sgii\sgiiBundle\Entity\TblCargo();
                    $entity->setCarNombre($valor);                    
                    break;
                }
//                case 'TblNivel':
//                {
//                    $entity = \sgii\sgiiBundle\Entity\TblNivel();
//                    break;
//                }
                case 'TblDepartamento':
                {
                    $entity = new \sgii\sgiiBundle\Entity\TblDepartamento();
                    $entity->setDepNombre($valor);
                    break;
                }
                case 'TblOrganizacion':
                {
                    $entity = new \sgii\sgiiBundle\Entity\TblOrganizacion();
                    $entity->setOrgNombre($valor);
                    break;
                }
            }
            
            $this->em->persist($entity);
            $this->em->flush();
        }
        
        return $entity;
    }
}
?>