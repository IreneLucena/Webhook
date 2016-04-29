<?php include 'header.php'; ?>

<div class="container">

<div class="row">
<div class="box">
<h1>Aceptados</h1>
<!-- AQUÍ VA LA TABLA -->
<?php 
	echo '<div>';
	while($data=$result->fetch_assoc())
	{
	$id=$data['id'];
	if($data['estado']=="Aceptado")
	{
	echo'<div class="contenedorTabla">
		<table class="candidatos">
		<thead>
	    <tr>
		    <th colspan="2">'.$data['nombre'].'</th>
		</tr>
		</thead>
		<tbody>
			<tr><td class="mensaje" rowspan="6">'.$data['cuerpo'].'</td></tr>
			<tr><td>'.$data['asunto'].'</td></tr>
			<tr><td>'.$data['fecha_alta'].'</td></tr>
			<tr><td>'.$data['estado'].'</td></tr>
			<tr><td>'.$data['categoria'].'</td></tr>
    		<tr><td colspan="2"><a href="adjuntos/'.$data['id'].'.zip" onclick=descargar(this)><img class="icono" src="business/img/files.png"></a></td></tr>
			<tr><td colspan="2"><input type="button" class="botonAc" name="borrar" value="Borrar" id="Borrar" onclick=borrar('.$id.')></td></tr>
		</tbody>';
		echo "</table></div>";
	}}
	echo '</div>';

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>

function borrar(id) 
{
	$.ajax({
	    url: "update.php",
	    type: "POST",
	    data: {
		    id : id,
		    name : "borrar",
		    },
	    success: function () {
	        alert("borando candidato...");
	        setTimeout(function() 
	       	{
	        	location.reload();
	        }, 1000);
	    }
	});
}
</script>

</div>
</div>
</div>
    <!-- /.container -->
<?php
	include 'footer.php';
?>

