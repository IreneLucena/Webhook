<?php
echo '<div>';
while($data=$result->fetch_assoc())
{
	$id=$data['id'];
	$nombre=$data['nombre'];
	$cuerpo=$data['cuerpo'];
	$fecha=$data['fecha_alta'];
	$asunto=$data['asunto'];
	$estado=$data['estado'];
	$categoria=$data['categoria'];
	$dir="uploads/".$id;


	echo'
	<div class="contenedorTabla">
	<div class="accordion">
	<form action="listar.php" method="post">
		<div class="accordion-section">
			<a class="title" href="#accordion'.$id.'">'.$nombre.'</a>
			<div id="accordion'.$id.'" class="accordion-section-content">
				<div class="firstContainer">
					<div class="fecha">Fecha de alta : '.$fecha.'</div>
					<div class="asunto">Asunto : '.$asunto.'</div>
					<div class="categoria" id="'.$categoria.'">Categoría : '.$categoria.'</div>
					<div class="estado" id="'.$estado.'">Estado : '.$estado.'</div>

				</div>
				<div class="secondContainer"><div class="cuerpoMensaje">'.$cuerpo.'</div></div>
				<div class="thirdContainer">
					<input type="button" name="Aceptar" class="boton" id='.$id.' value="Aceptar" onclick="aceptar('.$id.')"/>
	    			<input type="button" name="Rechazar" class="boton" id='.$id.' value="Rechazar" onclick="rechazar('.$id.')" />
				</div>
			</div>
		</div>
	</form>
	</div>
	</div>
</div>';
}

?>