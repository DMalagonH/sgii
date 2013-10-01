<?
include ('../../SGII_Class/MasterClass/PhpUtilities.php');
include ('../../SGII_Class/clsProyecto.php');
include ('../../SGII_Class/clsLineaInvestigacion.php');
include ('../../SGII_Class/clsTipoInvestigacion.php');
include ('../../SGII_Class/clsEstado_Proyecto.php');

$ObjDaUtilities = new DaPhpUtilities();
$ObjProyecto  = new clsProyecto();
$ObjLinea  = new clsLineaInvestigacion();
$ObjTipo  = new clsTipoInvestigacion();
$ObjEstadoProyecto  = new Estado_Proyecto();
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
?>