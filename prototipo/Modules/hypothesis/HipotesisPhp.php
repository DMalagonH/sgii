<?
session_start();
if(!empty($_POST['OptionMenu']))
{
	include ('../../SGII_Class/clsHipotesis.php');
	include ('../../SGII_Class/MasterClass/PhpUtilities.php');

	$ObjHipotesis = new Hipotesis();
	$ObjDaUtilities = new DaPhpUtilities();

	$ObjHipotesis->intHIP_NID = (empty($_POST['hidHipotesis'])? 0:$_POST['hidHipotesis'] );
	$ObjHipotesis->strHIP_CHIPOTESIS = (empty($_POST['txtHipotesis'])? 'NULL':$_POST['txtHipotesis'] );
	$ObjHipotesis->blnHIP_OESTADO =(empty($_POST['chkHipotesisActiva'])? '0':$_POST['chkHipotesisActiva'] );
	$ObjHipotesis->intPRO_NID =(empty($_POST['hidProyect'])? 'NULL':$_POST['hidProyect'] );
	$ObjHipotesis->intEHI_NID = (empty($_POST['cboEstadoHipotesis'] )? 'NULL':$_POST['cboEstadoHipotesis'] );
	
	$ObjHipotesis->strHIP_CSEGUIMIENTO = (empty($_POST['txtSeguimientoHip'] )? 'NULL':  '<b>'.date("Y-m-d").'</b><br/>'.$_POST['txtSeguimientoHip'].'<br/>' );

	
	
	if($_POST['OptionMenu'] <> 'Seguimiento')
	{
		$ObjHipotesis->SPR_IU_HIPOTESIS($ObjDaUtilities);
	}
	else
	{
		$ObjHipotesis->SPR_UPD_HIPOTESIS_SEGUIMIENTO($ObjDaUtilities);
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
	//retorno.submit(); //onload="JavaScript:atras();"
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
<form action = 'Hipotesis.php' name = 'retorno' method ='POST' > <!-- target ="accion" -->
</form>
</body>
</html>