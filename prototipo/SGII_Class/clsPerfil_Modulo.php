<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Perfil_Modulo
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Perfil_Modulo{



	/*** Atributos ***/

	var $intUPM_NID;
	var $intPER_NID;
	var $intMOD_NID;
	/*** Constructor ***/
	function Perfil_Modulo()
	{
		$this->intUPM_NID = 0; 
		$this->intPER_NID = 0; 
		$this->intMOD_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_PERFIL_MODULO($ObjDaUtilities)
	{
		if($this->intUPM_NID == 0)
		{
		  $result = $this->SPR_INS_PERFIL_MODULO($ObjDaUtilities);
		}
		Else
		{
		  /*** no requiere actualizacion $result = $this->SPR_UPD_PERFIL_MODULO($ObjDaUtilities); ***/
		}
		return $result;
	}
	function SPR_INS_PERFIL_MODULO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	/*** function SPR_UPD_PERFIL_MODULO($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	} ***/
	function SPR_GET_PERFIL_MODULO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_MODULO_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PERFIL_MODULO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_MODULO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PERFIL_MODULO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_MODULO_BY_ID` (".$this->intUPM_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
