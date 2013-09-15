<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Herramienta_Proyecto
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Herramienta_Proyecto{



	/*** Atributos ***/

	var $intUHP_NID;
	var $intHER_NID;
	var $intPRO_NID;
	/*** Constructor ***/
	function Herramienta_Proyecto()
	{
		$this->intUHP_NID = 0; 
		$this->intHER_NID = 0; 
		$this->intPRO_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_HERRAMIENTA_PROYECTO($ObjDaUtilities)
	{
		if($this->intUHP_NID == 0)
		{
		  $result = $this->SPR_INS_HERRAMIENTA_PROYECTO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_HERRAMIENTA_PROYECTO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_HERRAMIENTA_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_HERRAMIENTA_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HERRAMIENTA_PROYECTO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_PROYECTO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}	
	function SPR_GET_HERRAMIENTA_PROYECTO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_PROYECTO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_HERRAMIENTA_PROYECTO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_HERRAMIENTA_PROYECTO_BY_ID` (".$this->intUHP_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
