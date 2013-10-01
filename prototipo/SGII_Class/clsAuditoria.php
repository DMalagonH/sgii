<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Auditoria
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Auditoria{



	/*** Atributos ***/

	var $intAUD_NID;
	var $strAUD_CTABLE;
	var $strAUD_CCOLUMN;
	var $strAUD_COLD_VALUE;
	var $strAUD_CNEW_TABLE;
	var $dteAUD_DDATE_TRANSACTION;
	var $intUSU_NID;
	/*** Constructor ***/
	function Auditoria()
	{
		$this->intAUD_NID = 0; 
		$this->strAUD_CTABLE = ""; 
		$this->strAUD_CCOLUMN = ""; 
		$this->strAUD_COLD_VALUE = ""; 
		$this->strAUD_CNEW_TABLE = ""; 
		$this->dteAUD_DDATE_TRANSACTION = ""; 
		$this->intUSU_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento almacenado ***/
	function SPR_IU_AUDITORIA($ObjDaUtilities)
	{
		if($this->intAUD_NID == 0)
		{
		  $result = $this->SPR_INS_AUDITORIA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_AUDITORIA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_AUDITORIA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_AUDITORIA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_AUDITORIA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_AUDITORIA_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_AUDITORIA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_AUDITORIA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_AUDITORIA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_AUDITORIA_BY_ID` (".$this->intAUD_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
