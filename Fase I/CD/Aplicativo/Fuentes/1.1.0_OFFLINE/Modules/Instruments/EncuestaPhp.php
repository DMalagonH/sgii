<?
session_start();
if(!empty($_POST['OptionMenu']))
{
	include ('../../SGII_Class/clsHerramienta.php');
	include ('../../SGII_Class/MasterClass/PhpUtilities.php');

	$Herramienta  = new clsProyecto();
	$ObjDaUtilities = new DaPhpUtilities();

	$Herramienta->intHER_NID = (empty($_POST['hidHerramienta'])? 0:$_POST['hidHerramienta'] );
	$Herramienta->strHER_CNOMBRE_HERRAMIENTA = (empty($_POST['txtNombreEncuesta'])? 'NULL':$_POST['txtNombreEncuesta'] );
	$Herramienta->dteHER_DFECHA_INICIO =(empty($_POST['dteFechaIni'])? 'NULL':$_POST['dteFechaIni'] );
	$Herramienta->dteHER_DFECHA_FIN =(empty($_POST['dteFechaFin'])? 'NULL':$_POST['dteFechaFin'] );

	$Herramienta->intTHE_NID = (empty($_POST['hidTipoHerramienta'] )? 'NULL':$_POST['hidTipoHerramienta'] );
	$Herramienta->blnHER_OESTADO =(empty($_POST['chkEncuestaActiva'])? 'NULL':$_POST['chkEncuestaActiva'] );


	
	if (($_POST['OptionMenu']=='Modificar') ||($_POST['OptionMenu']=='Crear'))
	{
		$Herramienta->lngEstadoProyecto = ($Herramienta->intID== 0 ? '1':'NULL' );
		$Herramienta->SPR_IU_PROYECTO($ObjDaUtilities);
	}
	else if($_POST['OptionMenu']=='Cerrar')
	{
		$Herramienta->lngEstadoProyecto =  (empty($_POST['cboEstadoProyecto'] )? 'NULL':$_POST['cboEstadoProyecto'] );
		$Herramienta->SPR_UPD_PROYECTO_CIERRE($ObjDaUtilities);
	}

}

?>
<html>
<head>
<script language ="JavaScript">
<!--
function atras()
{
	alert("Los datos han sido actualizados correctamente.");
	retorno.submit(); //onload="JavaScript:atras();"
}
-->
</script>
</head>
<body onload="JavaScript:atras();">
<?
if(empty($_SESSION['UsuID']))
{
	header( 'Location: ../../RestrictedAccess.php' ) ; 
}
?>
<form action = 'Proyecto.php' name = 'retorno' method ='POST' > <!-- target ="accion" -->
</form>
</body>
</html>