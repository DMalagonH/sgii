<?php
namespace sgii\sgiiBundle\Services;

use Symfony\Component\Validator\Constraints as Assert;

class ValidateService
{
    var $validator;
    
    function __construct($validator)
    {
        $this->validator = $validator;
    }
    
    public function validateEmail($email, $require=true)
    {
        $return = false;
        if(!empty($email))
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) $return = true;        
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateDominio($dominio, $require=true)
    {
        $return = false;
        if(!empty($dominio))
        {
            if(preg_match('/^[A-Za-z0-9-.]+\.[A-Za-z]{2,4}$/', $dominio)) $return = true;            
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateIp($ip, $require=true)
    {
        $return = false;
        if(!empty($ip))
        {
            if(filter_var($ip, FILTER_VALIDATE_IP)) $return = true;        
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateUrl($url, $require=true)
    {
        $return = false;
        if(!empty($url))
        {
            if(preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)) $return = true;
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateDate($ObjDateTime, $tipo=false, $require=true)
    {
        $return = false;
        
        $ArrDateTime = $this->ObjectToArray($ObjDateTime);
        $DateTime = $ArrDateTime['date'];
        
        $date = explode(' ', $DateTime);
        $date = $date[0];
        
        if(!empty($date))
        {
            $hoy = date('Y-m-d');

            $exp_date = explode('-', $date);

            if(checkdate($exp_date[1], $exp_date[2], $exp_date[0]))
            {
                if(!$tipo)
                {
                    $return = true;
                }
                else
                {
                    switch ($tipo)
                    {
                        case 'futura':
                        {
                            if(strtotime($date) >= strtotime($hoy))
                            {
                                $return = true;
                            }
                            break;
                        }
                        case 'pasada':
                        {
                            if(strtotime($date) <= strtotime($hoy))
                            {
                                $return = true;
                            }
                            break;
                        }
                    }
                }
            }
        }
        elseif(!$require) $return = true;
        return $return;
    }

    public function validateDateFormat($strDate, $format='dd/mm/yyyy', $require=true)
    {
        $return = false;
        if(!empty($strDate))
        {
            if($format == 'dd/mm/yyyy')
                if(preg_match('/^[0-9]{1,2}+\/[0-9]{1,2}+\/[0-9]{4}$/', $strDate)) $return = true;
            else
                if(preg_match('/[0-9]/', $strDate)) $return = true;
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateTextOnly($txt, $require=true)
    {
        $return = false;
        if(!empty($txt))
        {
            $regex = new Assert\Regex(Array('pattern'=>'/^[a-zA-Z áéíóúÁÉÍÓÚñÑ]*$/'));
            
            if(count($this->validator->validateValue($txt, $regex)) == 0) $return = true;
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateAlfaNum($txt, $require=true)
    {
        $return = false;
        if(!empty($txt))
        {
            $regex = new Assert\Regex(Array('pattern'=>'/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]*$/'));
            
            if(count($this->validator->validateValue($txt, $regex)) == 0) $return = true;
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function validateNumOnly($txt, $require=true)
    {
        $return = false;
        if(!empty($txt))
        {
            $regex = new Assert\Regex(Array('pattern'=>'/^[0-9]*$/'));
            
            if(count($this->validator->validateValue($txt, $regex)) == 0) $return = true;
        }
        elseif(!$require) $return = true;
        
        return $return;
    }
    
    public function ObjectToArray($Objeto) {
        if (is_object ( $Objeto ))
        $Objeto = get_object_vars ( $Objeto );
        if (is_array ( $Objeto ))
        foreach ( $Objeto as $key => $value )
        $Objeto [$key] =  $this->ObjectToArray( $Objeto [$key] );
        return $Objeto;
    }
}
?>
