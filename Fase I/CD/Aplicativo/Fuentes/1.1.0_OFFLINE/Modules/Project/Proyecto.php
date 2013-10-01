<? 
	session_start();
	//$_SESSION['UsuID']= 1;
	if(empty($_SESSION['UsuID']))
	{
		header( 'Location: ../../RestrictedAccess.php' ) ;
	}

	include ('HeaderProyecto.php');
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
	function SelectedModule(Modulo)
	{
		switch(Modulo)
		{
		
			case 1:

				frmGestionPr.OptionMenu.value="Crear";
				frmGestionPr.submit();
				break;
			case 2:

				frmGestionPr.OptionMenu.value="Modificar";
				frmGestionPr.submit();
				break;
			case 3:

				frmGestionPr.OptionMenu.value="Cerrar";
				frmGestionPr.submit();
				break;
			case 4:
				frmGestionPr.action="../MainMenu.php";
				frmGestionPr.OptionMenu.value="";
				frmGestionPr.submit();
				break;	
		}

	}
	function SelectedProyecto(ProyectoId)
	{
		
		frmSelectedProyect.hidProyect.value =ProyectoId
		frmSelectedProyect.submit();
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
</script>
</head>
<body Class="bodySGII">
<div id="logo" class="Logo_Sgii">
	<img src="../../Resourses/Images/Images_Company/Mipana_logo.png"></img>
</div>
<div id="content" class="divContent" >
<br/>
<h1>Gestor de proyectos</h1>
<hr/>
<table align="center">
	<tr>
		<td>
			<div id="ProyectosTop" class="DivTopTable">
			<br/>
			</div>
			<div id="Proyectosbody" class="DivBodyTable">
			<div id="MainProyectos">
				<br/>
				<form name="frmGestionPr" method="Post" action="Proyecto.php">
					<input type ="hidden" name="OptionMenu" value ="<? echo (empty($_POST['OptionMenu'])? null:$_POST['OptionMenu']) ;?>">	
				</form>
				<table >
					<tr>
						<td width="212px">
							<div class="menuPrincipal" >
								<ul>
								<li class="miMenu">
									<a href="#Crear" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(1);" name ="Crear"><img src="../../Resourses/Images/Button/NewPr28x28.png" alt="">
									Crear proyecto
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
									<a href="#Modificar" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(2);" name="Modificar"><img src="../../Resourses/Images/Button/EditPr28x28.png" alt="">
									Modificar proyecto
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
									<a href="#Cerrar" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(3);" name="Cerrar"><img src="../../Resourses/Images/Button/ClearPr28x28.png" alt="">
									Cerrar proyecto
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
									<a href="#Cerrar" onfocus="blurLink(this);" onclick="JavaScript:SelectedModule(4);" name="Cerrar">
									Volver
									</a>
								</li>
								</ul>
							</div>	
						</td>
					</tr>
				</table>
			</div>
			</div>
			<div id="ProyectosBottom" class="DivBotttomTable">
			<br/>
			</div>
		</td>
		<td width="15px" ><br/>
		<td/>
		<td>
			<? if ((((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Modificar") || ((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Cerrar")) && empty($_POST['hidProyect']))
			{?>
			<a name="Modificar"></a>
			<div id="VisorProyectos" >
				<div id="VisorProyectosTblT" class="DivTopTable">
				<br/>
				</div>
				<div id="VisorProyectosTblBd" class="DivBodyTable">
					<form name = "frmSelectedProyect" method="Post" action="Proyecto.php">
				
					<input type ="hidden" name="hidProyect" value ="<? echo (empty($_POST['hidProyect'])?"":$_POST['hidProyect']);?>" />
					<input type ="hidden" name="OptionMenu" value ="<? echo $_POST['OptionMenu'];?>">
					<input type ="hidden" name="AllProyect" value ="<? echo (empty($_POST['AllProyect'])?1:$_POST['AllProyect']);?>" />
						<table border ="1" class="TableSGII">
							<tr>
								<td colspan = "2" <? 
									if((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Cerrar")
									{
										echo " style='display:none;'";
									}?>>
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
							<tr>
								<th colspan ="2" class="thSGII">
									Modificar proyecto
								</th>
							</tr>
							<?
							$ObjProyecto->intUsuNid=$_SESSION['UsuID'];
							if((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Cerrar")
							{
								$result = $ObjProyecto->SPR_GET_PROYECTO_BY_USER_ACTIVE_CLOSED($ObjDaUtilities);
							}
							else
							{
								if($_POST['AllProyect'] ==1) 
								{
									$result = $ObjProyecto->SPR_GET_PROYECTO_BY_USER_ACTIVE($ObjDaUtilities);
								}
								else if($_POST['AllProyect'] ==0) 
								{
									$result = $ObjProyecto->SPR_GET_PROYECTO_BY_USER($ObjDaUtilities);
								}	
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
			<?} 
			else if (((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Cerrar") && (!empty($_POST['hidProyect']))) 
			{?>
			<a name="Cerrar"></a>
			<div id="DivCerrarProyecto" >
				<div id="DivCerrarProyectoTblT" class="DivTopTable">
				<br/>
				</div>
				<div id="DivCerrarProyectoTblBd" class="DivBodyTable">
				<form name="frmCerrarmodificar" method ="Post" action="ProyectoPhp.php">
					<input type ="hidden" name="OptionMenu" value ="<? echo $_POST['OptionMenu'];?>">
					<input type ="hidden" name="hidProyect" value ="<? echo (empty($_POST['hidProyect'])?"":$_POST['hidProyect']);?>">
					<?
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
								echo "Error";
							}
							
						}
					?>
					<table border ="1" class="TableSGII">
						<tr>
							<th colspan ="2" class="thSGII">
								Cerrar proyecto
							</th>
						</tr>
						<tr>
							<td class='tdSGII_A'>Conclusiones:</td>
							<td class='tdSGII_B'><Textarea cols ="23" id="txtClusionesProyecto" name ="txtClusionesProyecto" rows = "5" ></textarea></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Demostraciones:</td>
							<td class='tdSGII_B'><Textarea cols ="23" id="txtDemoProyecto" name ="txtDemoProyecto" rows = "5" ></textarea></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Recomedaciones:</td>
							<td class='tdSGII_B'><Textarea cols ="23" id="txtRecomendacionProyecto" name ="txtRecomendacionProyecto" rows = "5" ></textarea></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Estado:</td>
							<td class='tdSGII_B'><Select style="width:212px;" id="cboEstadoProyecto" name ="cboEstadoProyecto" >
								<?
									$DataSourse = $ObjEstadoProyecto->SPR_GET_ESTADO_PROYECTO_ALL_ACTIVE($ObjDaUtilities);
									$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "EPR_CESTADO_PROYECTO", "EPR_NID", -1);
								?>
								</select></td>
						</tr>
						<tr>	
							<td colspan ="2" align="center">
								<br/>
								<table width="212px" align="center">
									<tr>	
										<td>
										</td>
										<td >
											<div class="menuPrincipal" width="212px">
												<ul>
												<li class="miMenu">
													<a href="#" onfocus="blurLink(this);" onclick="submit();"><img src="../../Resourses/Images/Button/SavePr28x28.png" alt="">
													Guardar proyecto
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
				<div id="DivCerrarProyectoTblB" class="DivBotttomTable">
				<br/>
				</div>
			</div>
			<?}
			else if ((((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Crear") && (empty($_POST['hidProyect']))) || (((empty($_POST['OptionMenu'])? "":$_POST['OptionMenu'])=="Modificar") && (!empty($_POST['hidProyect']))))
			{?>
			<a name="Crear"></a>
			<div id="DivCrearProyecto" >
				<div id="DivCrearProyectoTblT" class="DivTopTable">
				<br/>
				</div>
				<div id="DivCrearProyectoTblBd" class="DivBodyTable">
				<form action ="ProyectoPhp.php" name="frmCrearmodificar" method ="Post" >
				<input type ="hidden" name="OptionMenu" value ="<? echo $_POST['OptionMenu'];?>">
					<?
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
					<table border ="1" class="TableSGII">
						<tr>
							<th colspan ="2" class="thSGII">
								<? if(!empty($_POST['hidProyect'])) { echo "Modificar";} else {echo "Crear";}?> proyecto
								<input type ='hidden' name ='hidProyect' value='<? echo (empty($_POST['hidProyect'])?0:$_POST['hidProyect']);?>'>
							</th>
						</tr>
						<tr>
							<td class='tdSGII_A'>Fecha de creación:</td>
							<td class='tdSGII_B'><? echo ($row['PRO_DFECHA_PROYECTO']==null? date("Y-m-d") : $row['PRO_DFECHA_PROYECTO']); ?></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Nombre del proyecto:</td>
							<td class='tdSGII_B'><input type="text" id="txtNombreProyecto" name ="txtNombreProyecto" style="width:212px;" value="<? echo $row['PRO_CNOMBRE'] ?>"></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Descripción del proyecto:</td>
							<td class='tdSGII_B'><Textarea cols ="23" id="txtDescProyecto" name ="txtDescProyecto" rows = "5" ><? echo $row['PRO_CDESCRIPCION'] ?></textarea></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Pregunta Problema:</td>
							<td class='tdSGII_B'><Textarea cols ="23" id="txtPreguntaProblema" name ="txtPreguntaProblema" rows = "5" ><? echo $row['PRO_CPROBLEMA'] ?></textarea></td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Estado de proyecto:</td>
							<td class='tdSGII_B'>
								<?
									echo $row['EPR_CESTADO_PROYECTO'];
								?>
							</td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Tipo de investigación:</td>
							<td class='tdSGII_B'>
								<Select style="width:212px;" id="cboTipoProyecto" name ="cboTipoProyecto" >
								<?
									$DataSourse = $ObjTipo->SPR_GET_TIPO_INVESTIGACION_ALL_ACTIVE($ObjDaUtilities);
									$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "TIN_CNOMBRE_TIPO", "TIN_NID", $row['TIN_NID']);

								?>
								</select>
							</td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Línea de investigación:</td>
							<td class='tdSGII_B'>
								<Select style="width:212px;" id="cboLineaProyecto" name ="cboLineaProyecto" >
									<?
									$DataSourse = $ObjLinea->SPR_GET_LINEA_INVESTIGACION_ALL_ACTIVE($ObjDaUtilities);
									$ObjDaUtilities->mtdCreateOptionsComboBox($DataSourse, "LIN_CNOMBRE_INVESTIGACION", "LIN_NID", $row['LIN_NID']);
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td class='tdSGII_A'>Activo:</td>
							<td class='tdSGII_B'>
								<input type="checkbox" name="chkActivo" <?
									if($row['PRO_OESTADO']==1)
									{
										echo " checked ";
									}
								?> value ="<? echo $row['PRO_OESTADO'];?>" onclick="CheckValue(this);"/>
								</td>
						</tr>
						<tr>
							<td  colspan ="2" align="center" ><br/><br/>
								<table width="212px" align="center">
								<tr>	
									<td>
									</td>
									<td >
										<div class="menuPrincipal" width="212px">
											<ul>
											<li class="miMenu">
												<a href='#' onfocus="blurLink(this);" onclick="submit();" name ="btnChanguesProyect"><img src="../../Resourses/Images/Button/SavePr28x28.png" alt="">
												Guardar proyecto
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
				<div id="DivCrearProyectoTblB" class="DivBotttomTable">
				<br/>
				</div>
			</div>
		<br/>
		<br/>
		<?}?>
		</td>
	</tr>
</table>
</div>
<? $ObjDaUtilities->mtdFooterPage();?>
</body>
</html>