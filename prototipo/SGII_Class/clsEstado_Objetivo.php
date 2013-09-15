<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Estado_Objetivo
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Estado_Objetivo{



	/*** Atributos ***/

	var $intEOB_NID;
	var $strEOB_CESTADO_OBJETIVO;
	var $blnEOB_OESTADO;
	/*** Constructor ***/
	function Estado_Objetivo()
	{
		$this->intEOB_NID = 0; 
		$this->strEOB_CESTADO_OBJETIVO = ""; 
		$this->blnEOB_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_ESTADO_OBJETIVO($ObjDaUtilities)
	{
		if($this->intEOB_NID == 0)
		{
		  $result = $this->SPR_INS_ESTADO_OBJETIVO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_ESTADO_OBJETIVO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_ESTADO_OBJETIVO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_ESTADO_OBJETIVO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_OBJETIVO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_OBJETIVO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}	
	function SPR_GET_ESTADO_OBJETIVO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_OBJETIVO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_OBJETIVO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_OBJETIVO_BY_ID` (".$this->intEOB_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
