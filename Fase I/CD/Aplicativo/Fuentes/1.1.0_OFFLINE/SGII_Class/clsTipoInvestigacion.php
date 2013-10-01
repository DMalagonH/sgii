<?
/*---------------------------------------------------------------------------------------------          
  Autor : Cristian Camilo Moreno         
  Fecha Creación : 15/05/2013          
  Propósito : Describir los atributos y las caracteristicas del objeto Tipo de investigacion
  Entradas : Ninguna 
  Fecha modificación     
  Cambio realizado :  
 -----------------------------------------------------------------------------------------------*/       
Class clsTipoInvestigacion{
	
	var $intID;
	var $strNombre;
	var $blnEstado;
	var $intTipoSql;
/*** Constructor ***/

	function clsTipoInvestigacion()
	{
		$this->intID = 0; 
		$this->strNombre = "";
		$this->blnEstado = true;
	}
	/*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_TIPO_INVESTIGACION($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	
	function SPR_GET_TIPO_INVESTIGACION_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_INVESTIGACION_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_INVESTIGACION_BY_ID($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	
}
?>