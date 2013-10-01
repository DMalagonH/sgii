<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Usario_Proyecto
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Usario_Proyecto{



	/*** Atributos ***/

	var intUUI_NID;
	var intUSU_NID;
	var intPRO_NID;
	/*** Constructor ***/
	function Usario_Proyecto()
	{
		$this->intUUI_NID = 0; 
		$this->intUSU_NID = 0; 
		$this->intPRO_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_USARIO_PROYECTO($ObjDaUtilities)
	{
		$Existe = SPR_GET_USARIO_PROYECTO_BY_ID($ObjDaUtilities);
		if($Existe == null)
		{
		  SPR_INS_USARIO_PROYECTO($ObjDaUtilities);
		}
		Else
		{
		  SPR_UPD_USARIO_PROYECTO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_USARIO_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_USARIO_PROYECTO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USARIO_PROYECTO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL 'SPR_GET_USARIO_PROYECTO_ALL' ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	function SPR_GET_USARIO_PROYECTO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL 'SPR_GET_USARIO_PROYECTO_ALL_ACTIVE' ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USARIO_PROYECTO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL 'SPR_GET_USARIO_PROYECTO_BY_ID' (".$this->intUUI_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
