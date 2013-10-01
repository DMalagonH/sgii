<?
/*---------------------------------------------------------------------------------------------          
  Autor : Cristian Camilo Moreno         
  Fecha Creación : 15/05/2013          
  Propósito : Describir los atributos y las caracteristicas del objeto Proyecto
  Entradas : Ninguna 
  Fecha modificación     
  Cambio realizado :  
 -----------------------------------------------------------------------------------------------*/       
Class clsProyecto{
	
	var $intID;
	var $strNombre;
	var $strDescripcion;
	var $strPreguntaProblema;
	var $strConcluciones;
	var $strDemostraciones;
	var $strRecomedaciones;
	var $lngEstadoProyecto;
	var $lngTipoInvestigacion;
	var $lngLineaInvestigacion;
	var $intUsuNid;
	var $blnEstado;
	
	var $intTipoSql;
/*** Constructor ***/

	function clsProyecto()
	{
		$this->intID = 0; 
		$this->strNombre ="";
		$this->strDescripcion = "";
		$this->strPreguntaProblema = "";
		$this->strConcluciones="";
		$this->strDemostraciones="";
		$this->strRecomedaciones ="";
		$this->lngEstadoProyecto =0;
		$this->lngTipoInvestigacion = 0;
		$this->lngLineaInvestigacion =0;
		$this->blnEstado =0;
		
		$this->intUsuNid = 0; 
		
	}
	/*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_UPD_PROYECTO($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_UPD_PROYECTO` ('".$this->strNombre."','".$this->strDescripcion."','".$this->strPreguntaProblema."',".$this->intUsuNid .", ".$this->lngEstadoProyecto.",".$this->lngLineaInvestigacion.",".$this->lngTipoInvestigacion.",".$this->intID.",".$this->blnEstado." );";
				//ECHO $SQL;
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_INS_PROYECTO($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_INS_PROYECTO` ('".$this->strNombre."','".$this->strDescripcion."','".$this->strPreguntaProblema."',".$this->intUsuNid .", ".$this->lngEstadoProyecto.",".$this->lngLineaInvestigacion.",".$this->lngTipoInvestigacion." );";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_IU_PROYECTO($ObjDaUtilities)
	{
		
		if($this->intID  == 0)
		{
			$result= $this->SPR_INS_PROYECTO($ObjDaUtilities);
		}
		Else
		{
			$result=$this->SPR_UPD_PROYECTO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_GET_PROYECTO_ALL($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PROYECTO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PROYECTO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PROYECTO_INVESTIGACION_BY_ID` (".$this->intID.");";
		
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PROYECTO_BY_USER($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PROYECTO_BY_USER` (".$this->intUsuNid.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_PROYECTO_CIERRE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_UPD_PROYECTO_CIERRE` ('".$this->strConcluciones."', '".$this->strDemostraciones."','".$this->strRecomedaciones."',".$this->lngEstadoProyecto.",".$this->intID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PROYECTO_BY_USER_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PROYECTO_BY_USER_ACTIVE` (".$this->intUsuNid.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PROYECTO_BY_USER_ACTIVE_CLOSED($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PROYECTO_BY_USER_ACTIVE_CLOSED` (".$this->intUsuNid.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>