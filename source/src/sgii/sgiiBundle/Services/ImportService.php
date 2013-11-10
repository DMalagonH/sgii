<?php

namespace sgii\sgiiBundle\Services;

use PHPExcel;
use PHPExcel_Reader_Excel2007;

class ImportService
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
     * Funcion para importar usuarios desde un archivo excel
     * 
     * @param Object $file objeto UploadedFile del formulario
     * @return boolean true si se realizo la importacion, false en caso contrario
     */
    public function importUsuarios($file)
    {
        $return = false;
        
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
//        for($i = 1; $i <= 50; $i++)
//        {
//            $data[$i]['usuCedula'] = $objExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
//            $data[$i]['usuNombre'] = $objExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
//            $data[$i]['usuApellido'] = $objExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
//            $data[$i]['usuLog'] = $objExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
//            $data[$i]['cargo'] = $objExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
//            $data[$i]['nivel'] = $objExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
//            $data[$i]['departamento'] = $objExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
//            $data[$i]['organizacion'] = $objExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
//        }
        
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        
        return $return;
    }
    
}
?>