<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Tipo_Pregunta
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Tipo_Pregunta{



	/*** Atributos ***/

	var $intTPR_NID;
	var $strTPR_CTIPO_PREGUNTA;
	var $blnTPR_OESTADO;
	/*** Constructor ***/
	function Tipo_Pregunta()
	{
		$this->intTPR_NID = 0; 
		$this->strTPR_CTIPO_PREGUNTA = ""; 
		$this->blnTPR_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_TIPO_PREGUNTA($ObjDaUtilities)
	{
		if($this->intTPR_NID == 0)
		{
		  $result = $this->SPR_INS_TIPO_PREGUNTA($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_TIPO_PREGUNTA($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_TIPO_PREGUNTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_TIPO_PREGUNTA($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_PREGUNTA_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_PREGUNTA_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_PREGUNTA_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_PREGUNTA_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_TIPO_PREGUNTA_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_TIPO_PREGUNTA_BY_ID` (".$this->intTPR_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
