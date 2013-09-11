<?
	session_start();
	//$_SESSION['UsuID']= 1;
	if(empty($_SESSION['UsuID']))
	{
		header( 'Location: ../RestrictedAccess.php' ) ;
	}

	include ('../Header.php');
?>
<html>
<head>
<? 
$ObjDaUtilities->mtdCallStyleSheet(); 
$ObjDaUtilities->mtdCallJavaScript ();
?>
<link rel='stylesheet' id='Sgii' href='../Resourses/Css/StyleSgii.css' type='text/css'/>
<script language="JavaScript">
	function SelectedModule(Modulo)
	{
		switch(Modulo)
		{
			case 1:
			frmMain.action="Project/Proyecto.php";
			frmMain.submit();
			break;
			case 2:
			frmMain.action="Objectives/Objetivos.php";
			frmMain.submit();
			break;
			case 3:
			frmMain.action="hypothesis/Hipotesis.php";
			frmMain.submit();
			break;
			case 4:
			frmMain.action="Instruments/Herramienta.php";
			frmMain.submit();
			break;
		}
	}
</script>
</head>
<body Class="bodySGII">
<div id="logo" class="Logo_Sgii">
	<img src="../Resourses/Images/Images_Company/Mipana_logo.png"></img>
</div>
<div id="contenido" class="divContent">
	<h1>Menú</h1>
	<hr/>

			<div id="MainMenu">
				<div id="MainMenuTop" class="DivTopTable">
				<br/>
				</div>
				<div id="MainMenuBody" class="DivBodyTable">
				<form name="frmMain" method="Post" action="#">
				</form>
				<table >
					<tr>
						<td width="212px">
							<div class="menuPrincipal" >
								<ul>
								<li class="miMenu">
									<a href="#" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(1);" name ="Crear"><img src="../Resourses/Images/Button/NewPr28x28.png" alt="">
									Proyectos
									</a>
								</li>
								</ul>
							</div>	
						</td>
						<td >
					</tr>
					<tr>	
						<td width="212px">
							<div class="menuPrincipal" >
								<ul>
								<li class="miMenu">
									<a href="#" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(3);" name="Cerrar"><img src="../Resourses/Images/Button/EditPr28x28.png" alt="">
									Hipotesis
									</a>
								</li>
								</ul>
							</div>	
						</td>
					</tr>
					<tr>		
						</td>		
						<td width="212px">
							<div class="menuPrincipal" >
								<ul>
								<li class="miMenu">
									<a href="#" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(2);" name="Modificar"><img src="../Resourses/Images/Button/ClearPr28x28.png" alt="">
									Objetivos
									</a>
								</li>
								</ul>
							</div>	
						</td>
					</tr>
					
					<tr>	
						<td width="212px">
							<div class="menuPrincipal" >
								<ul>
								<li class="miMenu">
									<a href="#" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(4);" name="Cerrar"><img src="../Resourses/Images/Button/ClearPr28x28.png" alt="">
									Salir
									</a>
								</li>
								</ul>
							</div>	
						</td>
					</tr>
				</table>
				</div>
				<div id="MainMenuBottom" class="DivBotttomTable">
				<br/>
				</div>	
	</div>
</div>	
<? $ObjDaUtilities->mtdFooterPage();?>
</body>
</html>