<?
/*---------------------------------------------------------------------------------------------          
  Autor : Cristian Camilo Moreno         
  Fecha Creación : 15/05/2013          
  Propósito : Describir los atributos y las caracteristicas del objeto linea de investigacion
  Entradas : Ninguna 
  Fecha modificación     
  Cambio realizado :  
 -----------------------------------------------------------------------------------------------*/       
Class clsLineaInvestigacion{
	
	var $intID;
	var $strNombre;
	var $blnEstado;
	var $intTipoSql;
/*** Constructor ***/

	function clsLineaInvestigacion()
	{
		$this->intID = 0; 
		$this->strNombre = "";
		$this->blnEstado = true;
	}
	/*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_LINEA_INVESTIGACION($ObjDaUtilities)
	{
		
		if($this->intID == null)
		{
			$result = $this->SPR_INS_LINEA_INVESTIGACION($ObjDaUtilities);
		}
		else
		{
			$result = $this->SPR_UPD_LINEA_INVESTIGACION($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_LINEA_INVESTIGACION($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_LINEA_INVESTIGACION($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_LINEA_INVESTIGACION_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_LINEA_INVESTIGACION_BY_ID($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	
}
?>