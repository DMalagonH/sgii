<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Objetivo
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Objetivo{



	/*** Atributos ***/

	var $intOBJ_NID;
	var $strOBJ_COBJETIVO;
	var $intOBJ_NID_PADRE;
	var $blnOBJ_OESTADO;
	var $intPRO_NID;
	var $intEOB_NID;
	/*** Constructor ***/
	function Objetivo()
	{
		$this->intOBJ_NID = 0; 
		$this->strOBJ_COBJETIVO = ""; 
		$this->intOBJ_NID_PADRE = 0; 
		$this->blnOBJ_OESTADO = ""; 
		$this->intPRO_NID = 0; 
		$this->intEOB_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_OBJETIVO($ObjDaUtilities)
	{
		if($this->intOBJ_NID == 0)
		{
		  $result = $this->SPR_INS_OBJETIVO($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_OBJETIVO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_OBJETIVO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_OBJETIVO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_OBJETIVO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_OBJETIVO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_OBJETIVO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_OBJETIVO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_OBJETIVO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_OBJETIVO_BY_ID` (".$this->intOBJ_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
