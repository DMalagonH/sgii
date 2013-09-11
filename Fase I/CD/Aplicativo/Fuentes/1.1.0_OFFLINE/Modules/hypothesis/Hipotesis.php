<? 
	session_start();
	//$_SESSION['UsuID']= 1;
	if(empty($_SESSION['UsuID']))
	{
		header( 'Location: RestrictedAccess.php' ) ;
	}

	include ('HeaderHipotesis.php');
?> 
<html>
<head>
<link rel='stylesheet' id='Sgii1' href='../../Library_off_line/Css1.css' type='text/css'/>
<link rel='stylesheet' id='Sgii2' href='../../Library_off_line/Css2.css' type='text/css'/>
<link rel='stylesheet' id='Sgii3' href='../../Library_off_line/Css3.css' type='text/css'/>
<link rel='stylesheet' id='Sgii4' href='../../Library_off_line/Css4.css' type='text/css'/>

<script language = "JavaScript" src="../../Library_off_line/Js1.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js2.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js3.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js4.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js5.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js6.js"></script>
<script language = "JavaScript" src="../../Library_off_line/Js7.js"></script>
	<link rel='stylesheet' id='Sgii' href='../../Resourses/Css/StyleSgii.css' type='text/css'/>
	<script language="JavaScript">
	<!--
		function ViewHistory()
		{
			if(document.getElementById('Div_Historial_Hipotesis').style.display == 'none')
			{
				document.getElementById('Div_Historial_Hipotesis').style.display='';
			}
			else if(document.getElementById('Div_Historial_Hipotesis').style.display == '')
			{
				document.getElementById('Div_Historial_Hipotesis').style.display='none';
			}
			
		}
		function ViewAllProyecto(chk)
		{
			
			if(chk.checked == true)
			{
				frmSelectedProyect.AllProyect.value = 1;
			}
			else
			{
				frmSelectedProyect.AllProyect.value = 0;
			}
			frmSelectedProyect.submit();
		}
		function SelectedProyecto(ProyectoId)
		{
			frmSelectedProyect.hidProyect.value =ProyectoId;
			frmSelectedProyect.submit();
		}
		function SelectedHipotesis(ProyectoHipotesisId)
		{
			frmHipotesis.action ="Hipotesis.php";
			frmHipotesis.hidHipotesis.value =ProyectoHipotesisId;
			frmHipotesis.submit();
		}
		function CheckValue(check)
		{
			if(check.checked)
			{
				check.value ="1";
			}
			else
			{
				check.value ="0";
			}
		}
	-->
	</script>
</head>
<body>
<div id="content" class="divContent" >
<br/>
<h1>Hipótesis</h1>
<hr/>
<? if (empty($_POST['hidProyect']))
{?>
<div id = "Div_Proyectos">
	<div id="VisorProyectosTblT" class="DivTopTable">
	<br/>
	</div>
	<div id="VisorProyectosTblBd" class="DivBodyTable">
		<form name = "frmSelectedProyect" method="Post" action="Hipotesis.php">
	
		<input type ="hidden" name="hidProyect" value ="<? echo (empty($_POST['hidProyect'])?"":$_POST['hidProyect']);?>" />
		<input type ="hidden" name="AllProyect" value ="<? echo (empty($_POST['AllProyect'])?1:$_POST['AllProyect']);?>" />
			<table border ="1" class="TableSGII">
				<tr>
					<td colspan = "2">
						<? if (empty($_POST['AllProyect'])){  
							$_POST['AllProyect']=0;
						}?>
							<input type ="checkbox" name="chkViweFull" <?
								echo "value ='".$_POST['AllProyect']."' ";
								if($_POST['AllProyect'] == 1) 
								{
									echo " checked ";
								}
								?> onclick="ViewAllProyecto(this);"> Todos los activos
						
					</td>
				</tr>

				<?
				$ObjProyecto->intUsuNid=$_SESSION['UsuID'];
				
				if($_POST['AllProyect'] ==1) 
				{
					$result = $ObjProyecto->SPR_GET_PROYECTO_BY_USER_ACTIVE($ObjDaUtilities);
				}
				else if($_POST['AllProyect'] ==0) 
				{
					$result = $ObjProyecto->SPR_GET_PROYECTO_BY_USER($ObjDaUtilities);
				}				
				$counter = 0;
				if($result == null)
				{
					echo "<tr><td colspan ='2' >Sin proyectos asignados...</td></tr>";
				}
				else
				{
					while ($row = $ObjDaUtilities->mtdNextRow($result)) { 
					   $counter++; 
					   if($counter % 2 == 0)
					   {
							echo "<tr class='tdSGII_A'>";
					   }
					   else
					   {
							echo "<tr class='tdSGII_B'>";
					   }
					   echo "<td><input type='radio' name = 'IDProyecto' value ='". $row["PRO_NID"]."' onclick='SelectedProyecto(this.value)'></td>" ;
					   echo "<td>". $row["PRO_CNOMBRE"]."</td>";
					   echo "</tr>" ;
					} 
				}
				?>
				
			</table>
		</form>
	</div>	
	<div id="VisorProyectosTblB" class="DivBotttomTable">
	<br/>
	</div>
	</div>
</div>
<?} 
else {

	if(!empty($_POST['hidProyect']))
	{
		$ObjProyecto->intID=$_POST['hidProyect'] ;
		$result = $ObjProyecto->SPR_GET_PROYECTO_BY_ID($ObjDaUtilities);
		if($result!= null)
		{
			$row = $ObjDaUtilities->mtdNextRow($result);
		}
		else
		{
			echo "Error ::: ".$_POST['hidProyect'];
		}
		
	}
	else
	{
		$row= null;
	}
	?>
	<br/><br/><br/>
	<h2>PROYECTO: <i><?echo $row['PRO_CNOMBRE'] ?></i></h2>
	<? if (empty($_POST['hidHipotesis'])) {?>
	<div id="Div_NuevaHipotesis">
		<div id="VisorHipotesisTblT" class="DivTopTable">
		<br/>
		</div>
		<div id="VisorHipotesisTblBd" class="DivBodyTable">
		<form name ="frmHipotesis" method ="POST" action="HipotesisPhp.php">
		<input type ="hidden" name="hidHipotesis" value ="<? echo (empty($_POST['hidHipotesis'])?"":$_POST['hidHipotesis']);?>">
		<input type ="hidden" name="hidProyect" value ="<? echo (empty($_POST['hidProyect'])?"":$_POST['hidProyect']);?>" />
		<input type ="hidden" name="OptionMenu" value ="<? echo (empty($_POST['OptionMenu'])?"":$_POST['OptionMenu']);?>" />
		<table border ="1" style ="TableSGII">
			<tr>
				<th class="thSGII">
				</th>
				<th class="thSGII">Descripción de la Hipótesis:</th>
				<th class="thSGII">Estado</th>
				<th class="thSGII">Activa</th>
			</tr>
			<?
			$ObjHipotesis->intPRO_NID=$_POST['hidProyect'] ;
			$result = $ObjHipotesis->SPR_GET_HIPOTESIS_BY_PROYECTO($ObjDaUtilities);
			if($result != null){

				$counter=0;
				while ($row = $ObjDaUtilities->mtdNextRow($result)) { 
				   $counter++; 
				   if($counter % 2 == 0)
				   {
						echo "<tr class='tdSGII_A'>";
				   }
				   else
				   {
						echo "<tr class='tdSGII_B'>";
				   }
				   echo "<td><input type='radio' name = 'IDHipotesis' value ='". $row["HIP_NID"]."' onclick='SelectedHipotesis(this.value)'></td>" ;
				   echo "<td>". $row["HIP_CHIPOTESIS"]."</td>";
				   echo "<td>"; 
				   ?> 
					<select name="cboEstadoHipotesis" disabled>
					<?
						$DataSourse = $ObjEstadoHipotesis->SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE($ObjDaUtilities);
						$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "EHI_CESTADO_HIPOTESIS", "EHI_NID", $row["EHI_NID"]);
					?>
					</select></td>
					<?
				   echo "<td><input type ='checkbox' name='chkActivo' value='". $row["HIP_OESTADO"]."' ".($row["HIP_OESTADO"]==1? ' checked ':'')."</td>";
				   echo "</tr>" ;
				} 
			}
			?>
				<tr>
					<td colspan ="4"><hr/></td>
				</tr>
				<tr>
					<td><input type="submit" name="btnAddHipotesis" value="Agregar" onclick="OptionMenu.value = 'Crear';"></td>
					<td style="vertical-align:middle;"><Textarea cols ="23" rows = "3" name ="txtHipotesis"></textarea></td>
					<td>
						<select name="cboEstadoHipotesis" >
							<?
							$DataSourse = $ObjEstadoHipotesis->SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE($ObjDaUtilities);
							$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "EHI_CESTADO_HIPOTESIS", "EHI_NID", -1);
							?>
						</select>
					</td>
					<td><input type="checkbox" name="chkHipotesisActiva" onclick="CheckValue(this);"></td>
				</tr>
		</table>
		</form>
		</div>
		<div id="VisorHipotesisTblB" class="DivBotttomTable">
		<br/>
		</div>
	</div>
	<?} else {?>
	<div id="Div_SeguimientoHipotesis">
		<div id="VisorSegHipotesisTblT" class="DivTopTable">
		<br/>
		</div>
		<div id="VisorSegHipotesisTblBd" class="DivBodyTable">
		<form name ="frmSeguimientoHipotesis" method ="POST" action="HipotesisPhp.php">
		<input type ="hidden" name="hidHipotesis" value ="<? echo (empty($_POST['hidHipotesis'])?"":$_POST['hidHipotesis']);?>">
		<input type ="hidden" name="hidProyect" value ="<? echo (empty($_POST['hidProyect'])?"":$_POST['hidProyect']);?>" />
		<input type ="hidden" name="OptionMenu" value ="<? echo (empty($_POST['OptionMenu'])?"":$_POST['OptionMenu']);?>" />
		<table border ="1">
				<tr>
					<?
						if(!empty($_POST['hidHipotesis']))
						{
							$ObjHipotesis->intHIP_NID=$_POST['hidHipotesis'] ;
							$result = $ObjHipotesis->SPR_GET_HIPOTESIS_BY_ID($ObjDaUtilities);
							if($result != null){
								$row_hip = $ObjDaUtilities->mtdNextRow($result); 
							}
						}
						else
						{
							echo "Error ::: ".$_POST['hidHipotesis'];
						}
					?>
					<td colspan ="2" ><b>Proyecto:</b><i><?echo $row['PRO_CNOMBRE'] ?></i></td>
				</tr>
				<tr>
					<td colspan ="2" ><b>Hipotesis: <?echo $row_hip['HIP_CHIPOTESIS'];?></b></td>
				</tr>
				<tr>
					<td>Estado</td>
					<td>
						<select name="cboEstadoHipotesis" >
						<?
							$DataSourse = $ObjEstadoHipotesis->SPR_GET_ESTADO_HIPOTESIS_ALL_ACTIVE($ObjDaUtilities);
							$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "EHI_CESTADO_HIPOTESIS", "EHI_NID", -1);
						
						?>
						</select>
					</td>
				</tr>
			
				<tr>
					<td style="vertical-align:middle;">Seguimiento a hipotesis:</td>
					<td><Textarea cols ="23" rows = "5" name ="txtSeguimientoHip"></textarea></td>
				</tr>
				<tr>	
					<td>Historial:</td>
					<td >
						<img src="../../Resourses/Images/Button/Reloj.jpg" style="Cursor:pointer;" onclick="JavaScript:ViewHistory();"></img>
						<div id="Div_Historial_Hipotesis" style="display:none;">
							<?echo ($row_hip['HIP_CSEGUIMIENTO']==''?'<b><i>Sin historial...</i></b>':$row_hip['HIP_CSEGUIMIENTO']);?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan ="4">
					<br/>
					<table width="212px" align="center">
						<tr>	
							<td>
							</td>
							<td >
								<div class="menuPrincipal" width="212px">
									<ul>
									<li class="miMenu">
										<a href="#" onfocus="blurLink(this);" onclick="OptionMenu.value = 'Seguimiento';submit();"><img src="../../Resourses/Images/Button/SavePr28x28.png" alt="">
										Guardar seguimiento
										</a>
									</li>
									</ul>
								</div>	
							</td>
						</tr>
					</table>
					</td>
				</tr>
			
		</table>
		</form>
		</div>
		<div id="VisorSegHipotesisTblB" class="DivBotttomTable">
	<?}?>	
		<br/>
		</div>
	</div>
	
<?}?>
<div id="div_Back" class="divContent">
<table>
<tr>	
	<td width="212px">
		<div class="menuPrincipal" >
			<ul>
			<li class="miMenu">
				<a href="../MainMenu.php" onfocus="blurLink(this);"  name="Cerrar">
				Volver
				</a>
			</li>
			</ul>
		</div>	
	</td>
</tr>
</table>
</div>
<? $ObjDaUtilities->mtdFooterPage();?>
</body>
</html>
