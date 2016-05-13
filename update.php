<?php
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
$id=$_POST['id'];
$name=$_POST['name'];
$category=$_POST['category'];
$categoryNew=$_POST['categoryNew'];


$idArr=explode(",", $id);

if($name=="aceptar"){
	$update="UPDATE candidatos SET estado='Aceptado' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($name=="rechazar"){
	$update="UPDATE candidatos SET estado='Rechazado' WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if($name=="borrar"){
	$update="DELETE FROM candidatos WHERE id='$id'";
	$result=mysqli_query($conn, $update);
}

if ($category){
	for ($i = 0; $i < count($idArr) ; $i++) {
		$update = "UPDATE candidatos SET categoria='$category' WHERE id='$idArr[$i]'";
		$result = mysqli_query($conn, $update);
	}
}
if ($categoryNew){
	for ($i = 0; $i < count($idArr) ; $i++) {
		$update = "UPDATE candidatos SET categoria='$categoryNew' WHERE id='$idArr[$i]'";
		$result = mysqli_query($conn, $update);
	}
}