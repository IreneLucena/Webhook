<?php
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
$id=$_POST['id'];
$nombre=$_POST['name'];
$categoria=$_POST['categoria'];

if($nombre=="aceptar")
{
$update="UPDATE candidatos SET estado='Aceptado' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($nombre=="rechazar")
{
	$update="UPDATE candidatos SET estado='Rechazado' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($nombre=="borrar")
{
	$update="DELETE FROM candidatos WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($categoria=="Diseño")
{
	$update="UPDATE candidatos SET categoria='Diseño grafico' WHERE id='$id'";
		$result=mysqli_query($conn, $update);
}

if($categoria=="Otros")
{
	$update="UPDATE candidatos SET categoria='Otros' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($categoria=="Programacion")
{
	$update="UPDATE candidatos SET categoria='Programacion' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}
?>