<?
session_start();
if(!empty($_POST['OptionMenu']))
{
	include ('../../SGII_Class/clsProyecto.php');
	include ('../../SGII_Class/MasterClass/PhpUtilities.php');

	$ObjProyecto  = new clsProyecto();
	$ObjDaUtilities = new DaPhpUtilities();

	$ObjProyecto->intID = (empty($_POST['hidProyect'])? 0:$_POST['hidProyect'] );
	$ObjProyecto->strNombre = (empty($_POST['txtNombreProyecto'])? 'NULL':$_POST['txtNombreProyecto'] );
	$ObjProyecto->strDescripcion =(empty($_POST['txtDescProyecto'])? 'NULL':$_POST['txtDescProyecto'] );
	$ObjProyecto->strPreguntaProblema =(empty($_POST['txtPreguntaProblema'])? 'NULL':$_POST['txtPreguntaProblema'] );

	$ObjProyecto->strConcluciones = (empty($_POST['txtClusionesProyecto'] )? 'NULL':$_POST['txtClusionesProyecto'] );
	$ObjProyecto->strDemostraciones =(empty($_POST['txtDemoProyecto'])? 'NULL':$_POST['txtDemoProyecto'] );
	$ObjProyecto->strRecomedaciones =(empty($_POST['txtRecomendacionProyecto'])? 'NULL':$_POST['txtRecomendacionProyecto'] );
	$ObjProyecto->blnEstado =(empty($_POST['chkActivo'])? '0':$_POST['chkActivo'] );
	
	
	$ObjProyecto->lngTipoInvestigacion = (empty($_POST['cboTipoProyecto'] )? 'NULL':$_POST['cboTipoProyecto'] );
	$ObjProyecto->lngLineaInvestigacion = (empty($_POST['cboLineaProyecto'])? 'NULL':$_POST['cboLineaProyecto'] );
	$ObjProyecto->intUsuNid = $_SESSION['UsuID'];
	
	if (($_POST['OptionMenu']=='Modificar') ||($_POST['OptionMenu']=='Crear'))
	{
		$ObjProyecto->lngEstadoProyecto = ($ObjProyecto->intID== 0 ? '1':'NULL' );
		$ObjProyecto->SPR_IU_PROYECTO($ObjDaUtilities);
	}
	else if($_POST['OptionMenu']=='Cerrar')
	{
		$ObjProyecto->lngEstadoProyecto =  (empty($_POST['cboEstadoProyecto'] )? 'NULL':$_POST['cboEstadoProyecto'] );
		$ObjProyecto->SPR_UPD_PROYECTO_CIERRE($ObjDaUtilities);
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