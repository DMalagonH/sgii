<?

/*--------------------------------------------------------------------------------------------- 
Autor : Cristian Camilo Moreno
Fecha Creación : 25/05/2013
Propósito : Describir los atributos y las caracteristicas del objeto Usuario
Entradas: Ninguna
Fecha modificación:
Cambio realizado
-----------------------------------------------------------------------------------------------*/

Class Usuario{



	/*** Atributos ***/

	var $intUSU_NID;
	var $strUSU_CCEDULA;
	var $strUSU_CNOMBRE;
	var $intUSU_NID_HOMOLOGO;
	var $dteUSU_DFECHA_CREA;
	var $strUSU_CLOG;
	var $strUSU_CPASSWORD;
	var $blnUSU_OESTADO;
	/*** Constructor ***/
	
	function Usuario()
	{
		$this->intUSU_NID = 0; 
		$this->strUSU_CCEDULA = ""; 
		$this->strUSU_CNOMBRE = ""; 
		$this->intUSU_NID_HOMOLOGO = 0; 
		$this->dteUSU_DFECHA_CREA = ""; 
		$this->strUSU_CLOG = ""; 
		$this->strUSU_CPASSWORD = ""; 
		$this->blnUSU_OESTADO = ""; 

	}
	  /*** Comportamientos como proecedimiento alamacenado ***/
	function SPR_IU_USUARIO($ObjDaUtilities)
	{
		$Existe = SPR_GET_USUARIO_BY_ID($ObjDaUtilities);
		if($Existe == null)
		{
		  SPR_INS_USUARIO($ObjDaUtilities);
		}
		Else
		{
		  SPR_UPD_USUARIO($ObjDaUtilities);
		}
		return $result;
	}
	function SPR_INS_USUARIO($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_UPD_USUARIO($ObjDaUtilities)
	{
		$SQL = "";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_ALL($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_ALL` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_ALL_ACTIVE($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_ALL_ACTIVE` ();";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_BY_ID($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_BY_ID` (".$this->intUSU_NID.");";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
	function SPR_GET_USUARIO_BY_LOG($ObjDaUtilities)
	{
		$SQL = "CALL `SPR_GET_USUARIO_BY_LOG` ('".$this->strUSU_CLOG."', '".$this->strUSU_CPASSWORD."');";
		$ObjDaUtilities->mtdOpenConectionBd();
		$result = $ObjDaUtilities->mtdEjecutarSQL($SQL);
		$ObjDaUtilities->mtdCloseConectionBd();
		return $result;
	}
}
?>
