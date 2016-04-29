
<?php include 'header.php'; ?>

<div class="container">

<div class="row">
<div class="box">
<h1>Sin categor&iacutea</h1>
<!-- AQUÍ VA LA TABLA -->
<?php 
	echo '<div>';
	while($data=$result->fetch_assoc())
	{
	if($data['categoria']=="Sin categoría"){
		
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
    		<tr><td colspan="2"><a href="../adjuntos/'.$data['id'].'.zip"><img class="icono" src="business/img/files.png"></a></td></tr>
			<tr><td colspan="2"><input type="button" name="Aceptar" class="boton" value="Aceptar" id="Aceptar"><input type="button" class="boton" name="Rechazar" value="Rechazar" id="Rechazar"></td></tr>
		</tbody>';
		echo "</table></div>";
	}}
	echo '</div>';

?>
                
</div>
</div>
</div>

<?php include 'footer.php'; ?>


