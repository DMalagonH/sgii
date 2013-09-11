<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Usuario_Perfil
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Usuario_Perfil{



	/*** Atributos ***/

	var $intUUP_NID;
	var $intUSU_NID;
	var $intPER_NID;
	/*** Constructor ***/
	function Usuario_Perfil()
	{
		$this->intUUP_NID = 0; 
		$this->intUSU_NID = 0; 
		$this->intPER_NID = 0; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_USUARIO_PERFIL($ObjDaUtilities)
	{
		if($this->intUUP_NID == 0)
		{
		  $result = $this->SPR_INS_USUARIO_PERFIL($ObjDaUtilities);
		}
		Else
		{
		  $result = $this->SPR_UPD_USUARIO_PERFIL($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_USUARIO_PERFIL($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_USUARIO_PERFIL($ObjDaUtilities)
	{
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PERFIL_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PERFIL_ALL` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PERFIL_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PERFIL_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_PERFIL_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_PERFIL_BY_ID` (".$this->intUUP_NID.");";
		$ObjDaUtilities->mtdOpenConetionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
