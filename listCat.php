<?php

include 'connect.php';
header ('Content-type: text/html; charset=utf-8');
echo '<script type="text/javascript" src="business/js/jquery-1.12.3.min.js"></script>
<link href="business/css/accordion.css" rel="stylesheet">
<script type="text/javascript" src="business/js/accordion.js"></script>';

$category=$_POST['category'];
$categoryArr=explode(",", $category);

while($data=$result->fetch_assoc())
{
    for($i=0;$i<count($categoryArr);$i++)
    {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $cuerpo = $data['cuerpo'];
        $fecha = $data['fecha_alta'];
        $asunto = $data['asunto'];
        $estado = $data['estado'];
        $categoria = $data['categoria'];
        $dir = "uploads/" . $id;

        if ($estado == $categoryArr[$i]){
            echo '
			<div class=containerAcc">
			<form action="listar.php" method="post">
			<div class="accordion">
			<div class="accordion-section">
			<a class="accordion-section-title" href="#accordion-' . $id . '">' . $nombre . '</a>
			<div id="accordion-' . $id . '" class="accordion-section-content">
			<div class="firstContainer">
			<div class="fecha">Fecha de alta : ' . $fecha . '</div>
			<div class="asunto">Asunto : ' . $asunto . '</div>
			<div class="categoria" id="' . $categoria . '">Categor�a : ' . $categoria . '</div>
			<div class="estado" id="' . $categoryArr[$i] . '">Estado : ' . $categoryArr[$i] . '</div>
			</div>
			<div class="secondContainer"><div class="cuerpoMensaje">' . $cuerpo . '</div></div>
			<div class="thirdContainer">
			<input type="button" name="Aceptar" class="boton" id=' . $id . ' value="Aceptar" onclick="aceptar(' . $id . ')"/>
			<input type="button" name="Rechazar" class="boton" id=' . $id . ' value="Rechazar" onclick="rechazar(' . $id . ')" />
			</div>
			</div>
			</div>
			</div>
			<div class="darCategoria">
			<p>Categor�a</p>
			<input type="checkbox" id="darC" class="darC" name=""><label for="sin">S/C</label>
			<input type="checkbox" id="darC" class="darC" name=""><label for="diseno">Dise�o</label>
			<input type="checkbox" id="darC" class="darC" name=""><label for="programacion">Programaci�n</label>
			<input type="checkbox" id="darC" class="darC" name=""><label for="otros">Otros</label>    					
			</div>
			</form>
			</div>';
        }
    }
}
?>