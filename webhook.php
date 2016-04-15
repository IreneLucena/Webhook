
<?php
if (isset($_POST["submit"])) 
{
	$nombre=$_POST["nombre"];
	$asunto=$_POST["asunto"];
	$cuerpoMensaje=$_POST["cuerpo"];
	$adjuntos=$_POST["adjuntos"];
	$categoria=$_POST["categoria"];
	$to = 'irene@doersdf.com';
	$cabecera .= "MIME-Version: 1.0\n";
	$cabecera .= "Content-Type: text/html; charset=ISO-8859-1\n";
	$cabecera .= 'X-Mailer: PHP/' . phpversion();

	$correo=mail($to,$asunto,$cuerpoMensaje,$cabecera);
	
	if (!$_POST['nombre']) 
	{
		$eNombre = 'Debe de añadir su nombre';
	}
	if (!$_POST['asunto']) 
	{
		$eAsunto = 'Debe añadir un asunto.';
	}
		
	if (!$_POST['cuerpo']) 
	{
		$eCuerpo = 'Tiene que escribir algo en el cuerpo del mensaje.';
	}

	if (!$_POST['adjuntos']) 
	{
		$eAdjuntos = 'Por favor añada los archivos que desee enviar.';
	}

//Si no hay errores, se envía el email.
	if (!$eNombre && !$eAsunto && !$eCuerpo && !$eAdjuntos) 
	{
		$resultado='<div class="success">Muchas gracias por enviar sus datos.</div>';
		echo $resultado;
		
		//Con esto añadimos a la tabla el mensaje enviado por el candidato.
		/*$link = mysql_connect("lldk227.servidoresdns.net", "qvo799","Arteria123");
		mysql_select_db("qvo799",$db);
		$sql= "INSERT INTO candidatos (nombre, asunto, cuerpo, adjuntos, fecha_alta, estado, categoria) " +
		"VALUES ('$nombre', '$asunto', '$cuerpo', '$adjuntos', '$fecha_alta', '$estado', '$categoria')";
		$result = mysql_query($sql);
		echo "¡Gracias! Hemos recibido sus datos.\n";
		*/
	} 
	else 
	{
		$resultado='<div class="danger">Ha habido un error. Inténtelo de nuevo.</div>';
		echo $resultado;
	}
}

?>