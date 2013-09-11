<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Respuesta
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Respuesta{



	/*** Atributos ***/

	var $intRES_NID;
	var $strRES_CRESPUESTA;
	var $blnRES_OESTADO;
	var $intPRE_NID;
	/*** Constructor ***/
	function Respuesta()
	{
		$this->intRES_NID = 0; 
		$this->strRES_CRESPUESTA = ""; 
		$this->blnRES_OESTADO = ""; 
		$this->intPRE_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_RESPUESTA($ObjDaUtilities)
	{
		if($this->intRES_NID == 0)
		{
		  $result = $this->SPR_INS_RESPUESTA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_RESPUESTA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_RESPUESTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_RESPUESTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESPUESTA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESPUESTA_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESPUESTA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESPUESTA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESPUESTA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESPUESTA_BY_ID` (".$this->intRES_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
