<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Log
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Log{



	/*** Atributos ***/

	var $intLOG_NID;
	var $dteLOG_DFECHA;
	var $intUSU_NID;
	var $LOG_IP;
	var $LOG_HOST;
	/*** Constructor ***/
	function Log()
	{
		$this->intLOG_NID = 0; 
		$this->dteLOG_DFECHA = ""; 
		$this->intUSU_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_LOG($ObjDaUtilities)
	{
		if($this->intLOG_NID == 0)
		{
		  $result = $this->SPR_INS_LOG($ObjDaUtilities);
		}
		Else
		{
		  /*** no requiere actualizacion $result = $this->SPR_UPD_LOG($ObjDaUtilities);***/
		}
		return $result;
	}
	function SPR_INS_LOG($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	/*** function SPR_UPD_LOG($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}***/
	function SPR_GET_LOG_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_LOG_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_LOG_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_LOG_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_LOG_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_LOG_BY_ID` (".$this->intLOG_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
