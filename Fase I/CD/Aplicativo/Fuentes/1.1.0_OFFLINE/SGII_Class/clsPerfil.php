<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Perfil
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Perfil{



	/*** Atributos ***/

	var $intPER_NID;
	var $strPER_CPERFIL;
	var $blnPER_OESTADO;
	/*** Constructor ***/
	function Perfil()
	{
		$this->intPER_NID = 0; 
		$this->strPER_CPERFIL = ""; 
		$this->blnPER_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_PERFIL($ObjDaUtilities)
	{
		if($this->intPER_NID == 0)
		{
		  $result = $this->SPR_INS_PERFIL($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_PERFIL($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_PERFIL($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_PERFIL($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PERFIL_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PERFIL_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_PERFIL_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_PERFIL_BY_ID` (".$this->intPER_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
