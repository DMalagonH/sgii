<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Estado_Proyecto
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Estado_Proyecto{



	/*** Atributos ***/

	var $intEPR_NID;
	var $strEPR_CESTADO_PROYECTO;
	var $blnEPR_OESTADO;
	/*** Constructor ***/
	
	function Estado_Proyecto()
	{
		$this->intEPR_NID = 0; 
		$this->strEPR_CESTADO_PROYECTO = ""; 
		$this->blnEPR_OESTADO = ""; 

	}
	 /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_ESTADO_PROYECTO($ObjDaUtilities)
	{
		
		if($this->intEPR_NID == 0)
		{
			$result = $this->SPR_INS_ESTADO_PROYECTO($ObjDaUtilities);
		}
		Else
		{
			$result = $this->SPR_UPD_ESTADO_PROYECTO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_ESTADO_PROYECTO($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_ESTADO_PROYECTO($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_PROYECTO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_PROYECTO_ALL` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_PROYECTO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_PROYECTO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_PROYECTO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_PROYECTO_BY_ID` (".$this->intEPR_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
