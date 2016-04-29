<?php
//Nos conectamos al servidor
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");

$categoria = $_POST['categoria'];
$query=("select categoria from candidatos where state='$categoria'");
$result=mysqli_query($conn, $query);

while($row=$result->fetch_assoc())
{
//while($row=mysql_fetch_array($find))
	echo "<option>".$row['categoria']."</option>";
}

?>