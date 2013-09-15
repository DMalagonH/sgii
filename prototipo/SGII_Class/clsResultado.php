<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Resultado
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Resultado{



	/*** Atributos ***/

	var $intRST_NID;
	var $dteRST_DFECHA;
	var $blnRST_OESTADO;
	var $intUSU_NID;
	var $strRST_CPREGUNTA_TEXTUAL;
	var $strRST_CRESPUESTA_TEXTUAL;
	/*** Constructor ***/
	function Resultado()
	{
		$this->intRST_NID = 0; 
		$this->dteRST_DFECHA = ""; 
		$this->blnRST_OESTADO = ""; 
		$this->intUSU_NID = 0; 
		$this->strRST_CPREGUNTA_TEXTUAL = ""; 
		$this->strRST_CRESPUESTA_TEXTUAL = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_RESULTADO($ObjDaUtilities)
	{
		
		if($this->intRST_NID == 0)
		{
		  $result = $this->SPR_INS_RESULTADO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_RESULTADO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_RESULTADO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_RESULTADO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESULTADO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESULTADO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESULTADO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESULTADO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_RESULTADO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_RESULTADO_BY_ID` (".$this->intRST_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
