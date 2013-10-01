<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Estado_Hipotesis
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Estado_Hipotesis{



	/*** Atributos ***/

	var $intEHI_NID;
	var $strEHI_CESTADO_HIPOTESIS;
	var $blnEHI_OESTADO;
	/*** Constructor ***/
	function Estado_Hipotesis()
	{
		$this->intEHI_NID = 0; 
		$this->strEHI_CESTADO_HIPOTESIS = ""; 
		$this->blnEHI_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_ESTADO_HIPOTESIS($ObjDaUtilities)
	{
		
		if($this->intEHI_NID == 0)
		{
			$this->SPR_INS_ESTADO_HIPOTESIS($ObjDaUtilities);
		}
		Else
		{
			$this->SPR_UPD_ESTADO_HIPOTESIS($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_ESTADO_HIPOTESIS($ObjDaUtilities)
	{

		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_ESTADO_HIPOTESIS($ObjDaUtilities)
	{

		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_HIPOTESIS_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_HIPOTESIS_ALL` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_ESTADO_HIPOTESIS_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_ESTADO_HIPOTESIS_BY_ID` (".$this->intEHI_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
