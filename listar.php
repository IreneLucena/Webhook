<?php include 'header.php'; ?>

<div class="container">

<div class="row">
<div class="box">

<h1>Todos los candidatos</h1>
<!-- AQUÍ VA LA TABLA -->
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
				<div class="fecha">Fecha de alta : '.$fecha.'</div>
				<div class="asunto">Asunto : '.$asunto.'</div>
				<div class="categoria">Categoría : '.$categoria.'</div>
				<div class="cuerpo"> Leer mensaje : <div class="cuerpoMensaje">'.$cuerpo.'</div></div>
			</div>	
		</div>
	</form>
	</div>
	</div>';
		//====Que sí, muy bonito con la tabla, pero vamos a probar otra cosita====
		 /* <table class="candidatos">
			<thead>
		    <tr>
			    <th colspan="2" id="nombre">'.$data['nombre'].'</th>
			</tr>
			</thead>
			<tbody>
				<tr><td class="mensaje" rowspan="6"><p>'.$data['cuerpo'].'</p></td></tr>
				<tr><td><p>'.$data['asunto'].'</p></td></tr>
				<tr><td><p>'.$data['fecha_alta'].'</p></td></tr>';
				if($data['estado']=="Aceptado")
				{echo "<tr><td class='aceptado'><p>".$data['estado']."</p></td></tr>";}
				elseif($data['estado']=="Rechazado")
				{echo "<tr><td class='rechazado'><p>".$data['estado']."</p></td></tr>";}
				else
				{echo "<tr><td class='entrante'><p>".$data['estado']."</p></td></tr>";}
				
				if($data['categoria']=="Sin categoría"){
					echo '<tr><td><select name="categoria" id="categoria" onchange="categoria('.$id.')">
							  <option value="">Sin categoría</option>
							  <option value="Diseño">Diseño gráfico</option>
							  <option value="Programacion">Programación</option>
							  <option value="Otros">Otros</option>
						  </select></td></tr>';
				}
				else{echo '<tr><td><p>'.$data['categoria'].'</p></td></tr>';}
	    		echo '<tr><td colspan="2"><div class="archivo"></div></td></tr>s
				<tr><td colspan="2">
		    	
	    			<input type="button" name="Aceptar" class="boton" id='.$id.' value="Aceptar" onclick="aceptar('.$id.')"/>
	    			<input type="button" name="Rechazar" class="boton" id='.$id.' value="Rechazar" onclick="rechazar('.$id.')" />
	    		
	    		</td></tr>
			</tbody></table>';
		echo "</form></div>";*/
	}

echo '</div>';
?>
       
</div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
function aceptar(id) 
{
	$.ajax({
	    url: "update.php",
	    type: "POST",
	    data: {
		    id : id,
		    name : "aceptar",
		    },
	    success: function () {
	        alert("aceptando candidato...");
	        setTimeout(function() 
	       	{
	        	location.reload();
	        }, 1000);
	    }
	});
}

function rechazar(id) 
{
	$.ajax({
		url: "update.php",
	    type: "POST",
	    data: {
		    id : id,
		    name : "rechazar",
		},
	    success: function () {
	        alert("rechazando candidato...");
	        setTimeout(function() 
	        {
	        	location.reload();
	        }, 1000);
	    }
	});
}

function categoria(id) 
{
	var categoria=$("#categoria").val();
	$.ajax({
		url: "update.php",
	    type: "POST",
	    data: {
		    id : id,
		    categoria : categoria,
		},
	    success: function () {
	        alert("rechazando candidato...");
	        setTimeout(function() 
	        {
	        	location.reload();
	        }, 1000);
	    }
	});
}

function abrirVentana()
{
	var nombre=document.getElementById("nombre").innerHTML;
	var ventana= window.open("", "Adjuntos "+nombre, "status=1,width=400,height=300");
	ventana.document.write('<link href="business/css/business-casual.css" rel="stylesheet">');
	ventana.document.write('<link href="business/css/bootstrap.min.css" rel="stylesheet">');
	ventana.document.write('<div class="boxVentanaEmergente"');
	ventana.document.write('<h1>Adjuntos de '+nombre+'</h1>');
	ventana.document.write('</div>');
}

$(function() {
    $( ".accordion" ).accordion({
      collapsible: true
    });
  });

</script>


    <!-- /.container -->
<?php
include 'footer.php';
?>
