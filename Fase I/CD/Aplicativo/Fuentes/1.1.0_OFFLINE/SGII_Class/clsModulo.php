<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Modulo
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Modulo{



	/*** Atributos ***/

	var $intMOD_NID;
	var $strMOD_CNOMBRE;
	var $blnMOD_OESTADO;
	/*** Constructor ***/
	function Modulo()
	{
		$this->intMOD_NID = 0; 
		$this->strMOD_CNOMBRE = ""; 
		$this->blnMOD_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_MODULO($ObjDaUtilities)
	{
		if($this->intMOD_NID == 0)
		{
		  $result = $this->SPR_INS_MODULO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_MODULO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_MODULO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_MODULO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_MODULO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_MODULO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_MODULO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_MODULO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_MODULO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_MODULO_BY_ID` (".$this->intMOD_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
