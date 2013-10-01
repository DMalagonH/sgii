<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Tipo_Herramienta
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Tipo_Herramienta{



	/*** Atributos ***/

	var $intTHE_NID;
	var $strTHE_CNOMBRE_HERRAMIENTA;
	var $blnTHE_OESTADO;
	/*** Constructor ***/
	function Tipo_Herramienta()
	{
		$this->intTHE_NID = 0; 
		$this->strTHE_CNOMBRE_HERRAMIENTA = ""; 
		$this->blnTHE_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_TIPO_HERRAMIENTA($ObjDaUtilities)
	{
		if($this->intTHE_NID == 0)
		{
		  $result = $this->SPR_INS_TIPO_HERRAMIENTA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_TIPO_HERRAMIENTA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_TIPO_HERRAMIENTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_TIPO_HERRAMIENTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_HERRAMIENTA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_HERRAMIENTA_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_HERRAMIENTA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_HERRAMIENTA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_HERRAMIENTA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_HERRAMIENTA_BY_ID` (".$this->intTHE_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
