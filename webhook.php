<?php

//============Creamos el log si no existe============
$LOG_PATH = "uploads/uploadlog.txt";
if(!file_exists($LOG_PATH)) {
	fopen($LOG_PATH, "w");
	chmod($LOG_PATH, 0777);
}

//============Cogemos los datos del email============
$from=$_POST["from"];
$subject=$_POST["subject"];
$body=$_POST["text"];
$attNum=$_POST["attachments"];

$date = new DateTime();
$date=date("d/m/Y");

$status="Entrante";
$category="Sin categoría";

//============Conexión a la BD============

$conn=mysqli_connect("lldk227.servidoresdns.net","qvo799","Arteria123","qvo799");
if ($conn->connect_error)
{
	writeInLog($LOG_PATH, "Database error: " . $conn->connect_error);
}

//============Insertamos============
else
{
	$query="INSERT INTO candidatos (nombre, asunto, cuerpo, adjuntos, fecha_alta, estado, categoria)
	VALUES ('$from','$subject','$body','$attNum','$date','$status','$category')";

	if ($conn->query($query))
	{
		writeInLog($LOG_PATH, "$from :: $subject :: $body :: $attNum :: $date :: $status :: $category");
		
		$query2="SELECT * FROM candidatos WHERE nombre='$from'";
		$result=mysqli_query($conn, $query2);
		
		if ($result)
		{
			while ($data=$result->fetch_assoc())
			{
				$id=$data['id'];
				echo $id;
				writeInLog($LOG_PATH, "attachments: " . $attNum);
				if($attNum > 0)
				{
					//Creamos carpeta para los adjuntos...
					$directory="uploads/".$id;
					
					if(!file_exists($directory)){
						mkdir($directory, 0777, true);
						chmod('uploads', 0777);
						chmod('uploads/'.$id, 0777);
					}
					
					for($i=0; $i < $attNum; $i++)
					{
						$att = "attachment".($i+1);
						$tmp = $_FILES[$att]["tmp_name"];
						$from = $_FILES[$att]["name"];
						
						if(!move_uploaded_file($tmp, "$directory/$from")){
							writeInLog($LOG_PATH, "Can't move file from temp directory to destination");
						}
					}
				}
			}
		}
		else {
			writeInLog($LOG_PATH, "Can't retrieve candidate");
		}
	}
	else
	{
		writeInLog($LOG_PATH, "Insert candidate error");
	}
}
$conn->close();


function writeInLog($path, $txt){
	$fo = fopen($path, "w");
	$msg = date("Y-m-d H:i:s") . " MSG: " . $txt;
	fwrite($fo, $msg);
	fclose($fo);
};
?>