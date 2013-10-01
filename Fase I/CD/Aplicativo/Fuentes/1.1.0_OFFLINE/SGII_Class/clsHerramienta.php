<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Herramienta
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Herramienta{



	/*** Atributos ***/

	var $intHER_NID;
	var $strHER_CNOMBRE_HERRAMIENTA;
	var $dteHER_DFECHA_INICIO;
	var $dteHER_DFECHA_FIN;
	var $intTHE_NID;
	var $blnHER_OESTADO;
	/*** Constructor ***/
	function Herramienta()
	{
		$this->intHER_NID = 0; 
		$this->strHER_CNOMBRE_HERRAMIENTA = ""; 
		$this->dteHER_DFECHA_INICIO = ""; 
		$this->dteHER_DFECHA_FIN = ""; 
		$this->intTHE_NID = 0; 
		$this->blnHER_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_HERRAMIENTA($ObjDaUtilities)
	{
		if($this->intHER_NID == 0)
		{
		  $result = $this->SPR_INS_HERRAMIENTA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_HERRAMIENTA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_HERRAMIENTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_HERRAMIENTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HERRAMIENTA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_ALL` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HERRAMIENTA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HERRAMIENTA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_BY_ID` (".$this->intHER_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
