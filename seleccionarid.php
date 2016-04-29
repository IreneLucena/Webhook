<?php
//conexion
include("form.php");
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");

if ($conn->connect_error)
{
	die("Connection failed:".$conn->connect_error);
}

else
{
	echo "Estás dentro de la BD</br>";
	$name=$_POST['name'];
	echo $name."</br>";
	
	
	$query="SELECT id FROM candidatos WHERE nombre='$name'";
	$result=mysqli_query($conn, $query);
	if ($result) {
		while ($row=mysqli_fetch_assoc($result)) {
			echo "</br>".$row["id"];
		}
	}
	else{
		echo "ERROR : " .mysqli_error($conn);
	}	
}

$conn->close();
?>