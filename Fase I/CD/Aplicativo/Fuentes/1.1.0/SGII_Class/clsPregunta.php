<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Pregunta
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Pregunta{



	/*** Atributos ***/

	var $intPRE_NID;
	var $strPRE_CPREGUNTA;
	var $blnPRE_OOBLIGATORIA;
	var $blnPRE_OESTADO;
	var $intHER_NID;
	var $intTPR_NID;
	/*** Constructor ***/
	function Pregunta()
	{
		$this->intPRE_NID = 0; 
		$this->strPRE_CPREGUNTA = ""; 
		$this->blnPRE_OOBLIGATORIA = ""; 
		$this->blnPRE_OESTADO = ""; 
		$this->intHER_NID = 0; 
		$this->intTPR_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_PREGUNTA($ObjDaUtilities)
	{
		if($this->intPRE_NID == 0)
		{
		  $result = $this->SPR_INS_PREGUNTA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_PREGUNTA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_PREGUNTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_PREGUNTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PREGUNTA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PREGUNTA_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PREGUNTA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PREGUNTA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PREGUNTA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PREGUNTA_BY_ID` (".$this->intPRE_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
