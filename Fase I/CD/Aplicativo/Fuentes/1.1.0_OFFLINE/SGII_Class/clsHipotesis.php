<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Hipotesis
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Hipotesis{



	/*** Atributos ***/

	var $intHIP_NID;
	var $strHIP_CHIPOTESIS;
	var $blnHIP_OESTADO;
	var $intPRO_NID;
	var $intEHI_NID;
	/*** Constructor ***/
	function Hipotesis()
	{
		$this->intHIP_NID = 0; 
		$this->strHIP_CHIPOTESIS = ""; 
		$this->blnHIP_OESTADO = ""; 
		$this->intPRO_NID = 0; 
		$this->intEHI_NID = 0; 
		$this->strHIP_CSEGUIMIENTO = ''; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_HIPOTESIS($ObjDaUtilities)
	{
		
		if($this->intHIP_NID == 0)
		{
			$result = $this->SPR_INS_HIPOTESIS($ObjDaUtilities);
		}
		Else
		{
			$result = $this->SPR_UPD_HIPOTESIS($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_HIPOTESIS($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_INS_HIPOTESIS` ( '".$this->strHIP_CHIPOTESIS."', ".$this->blnHIP_OESTADO.", ".$this->intPRO_NID.",".$this->intEHI_NID.");";
		echo $SQL;
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_HIPOTESIS($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_UPD_HIPOTESIS` (".$this->intHIP_NID.", '".$this->strHIP_CHIPOTESIS."', ".$this->blnHIP_OESTADO.", ".$this->intPRO_NID.",".$this->intEHI_NID.");";

		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_HIPOTESIS_SEGUIMIENTO($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_UPD_HIPOTESIS_SEGUIMIENTO` (".$this->intHIP_NID.",".$this->intEHI_NID.", '".$this->strHIP_CSEGUIMIENTO."');";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	
	function SPR_GET_HIPOTESIS_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HIPOTESIS_ALL` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HIPOTESIS_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HIPOTESIS_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HIPOTESIS_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HIPOTESIS_BY_ID` (".$this->intHIP_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HIPOTESIS_BY_PROYECTO($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HIPOTESIS_BY_PROYECTO` (".$this->intPRO_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
