<?php
//Nos conectamos al servidor
$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
$conn->set_charset("UTF-8");
$query="SELECT * FROM candidatos";
$result=mysqli_query($conn, $query);

?>