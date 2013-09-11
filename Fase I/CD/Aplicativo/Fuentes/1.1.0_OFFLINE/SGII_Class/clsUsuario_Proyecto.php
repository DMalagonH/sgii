<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto USUARIO_Proyecto
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class USUARIO_Proyecto{



	/*** Atributos ***/

	var $intUUI_NID;
	var $intUSU_NID;
	var $intPRO_NID;
	/*** Constructor ***/
	function USUARIO_Proyecto()
	{
		$this->intUUI_NID = 0; 
		$this->intUSU_NID = 0; 
		$this->intPRO_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_USUARIO_PROYECTO($ObjDaUtilities)
	{
		if($this->intUUI_NID == 0)
		{
		  $result = $this->SPR_INS_USUARIO_PROYECTO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_USUARIO_PROYECTO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_USUARIO_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_USUARIO_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PROYECTO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PROYECTO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PROYECTO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PROYECTO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PROYECTO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PROYECTO_BY_ID` (".$this->intUUI_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
