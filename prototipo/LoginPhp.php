<?
session_start();
include ('SGII_Class/clsUsuario.php');
include ('SGII_Class/MasterClass/PhpUtilities.php');

$ObjUsuario  = new Usuario();
$ObjDaUtilities = new DaPhpUtilities();

$ObjUsuario->strUSU_CLOG = $_POST['txtusuario'];
$ObjUsuario->strUSU_CPASSWORD = $_POST['txtpassword'];
$result = $ObjUsuario->SPR_GET_USUARIO_BY_LOG($ObjDaUtilities);


	$row = $ObjDaUtilities->mtdNextRow($result);
	if($row['USU_NID']==null || $row['USU_NID'] == "")
	{
		if(isset($_SESSION['UsuID']))
		unset($_SESSION['UsuID']);
	}
	else
	{
		$_SESSION['UsuID']= $row['USU_NID'];
	}

?>
<html>
<head>
<link rel='stylesheet' id='Sgii' href='Resourses/Css/StyleSgii.css' type='text/css'/>
<script language ="JavaScript">
<!--
function atras()
{
	alert("Bienvenido!!!.");
	retorno.submit();
}
-->
</script>
</head>
<body  onload="JavaScript:atras();">
<?
	if(empty($_SESSION['UsuID']))
	{
		header( 'Location: index.php' ) ; 
	}
?>

<form action = 'Modules/MainMenu.php' name = 'retorno' method ='POST' > <!-- target ="accion" -->
	<input type='hidden' name = 'Token'	 value='1'>
</form>
</body>
</html>